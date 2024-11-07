<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use PDF; // Import the PDF facade
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\EmployeesExport;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Illuminate\Support\Facades\Storage;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Employee::query();

        // Filter by status
        if ($request->has('status') && $request->status != 'All') {
            $query->where('status', $request->status);
        }

        // Sort by creation date
        if ($request->has('sort')) {
            $query->orderBy('created_at', $request->sort == 'Latest' ? 'desc' : 'asc');
        }

        // Search by name, email, or phone
        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('phone', 'like', "%{$search}%");
            });
        }

        // Determine the number of entries per page
        $perPage = $request->get('per_page', 12); // Default to 12 if not specified

        $employees = $query->paginate($perPage);

        return view('employee', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('employee.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:employees,email',
            'phone' => 'required|string|max:15',
            'dob' => 'required|date',
            'hiring_date' => 'required|date',
            'experience' => 'required|integer',
            'address' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'availability' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Hash the password before saving
        $validatedData['password'] = bcrypt($validatedData['password']);

        // Create the employee
        Employee::create($validatedData);

        return redirect()->route('employee.index')->with('success', 'Employee created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.show', compact('employee'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $employee = Employee::findOrFail($id);
        return view('employee.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:255',
            'dob' => 'required|date',
            'hiring_date' => 'required|date',
            'experience' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'zip_code' => 'required|string|max:10',
            'city' => 'required|string|max:255',
            'role' => 'required|string|max:255',
            'availability' => 'required|string|max:255',
            'status' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $employee = Employee::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('image')) {
            if ($employee->photo) {
                Storage::disk('public')->delete($employee->photo);
            }
            $data['photo'] = $request->file('image')->store('employee_photos', 'public');
        }

        $employee->update($data);

        return redirect()->route('employee')->with('success', 'Employee updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $employee = Employee::findOrFail($id);
        if ($employee->photo) {
            Storage::disk('public')->delete($employee->photo);
        }
        $employee->delete();

        return redirect()->route('employee')->with('success', 'Employee deleted successfully.');
    }

    public function exportPdf()
    {
        $employees = Employee::all();
        $pdf = PDF::loadView('employee.export_pdf', compact('employees'));
        return $pdf->download('employees.pdf');
    }

    public function exportXls()
    {
        $employees = Employee::all();

        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set headers
        $sheet->setCellValue('A1', 'First Name');
        $sheet->setCellValue('B1', 'Last Name');
        $sheet->setCellValue('C1', 'Email');
        $sheet->setCellValue('D1', 'Phone');
        $sheet->setCellValue('E1', 'Date of Birth');
        $sheet->setCellValue('F1', 'Hiring Date');
        $sheet->setCellValue('G1', 'Experience');
        $sheet->setCellValue('H1', 'Address');
        $sheet->setCellValue('I1', 'Zip Code');
        $sheet->setCellValue('J1', 'City');
        $sheet->setCellValue('K1', 'Role');
        $sheet->setCellValue('L1', 'Availability');
        $sheet->setCellValue('M1', 'Status');
        // Add other headers as needed

        // Populate data
        $row = 2;
        foreach ($employees as $employee) {
            $sheet->setCellValue('A' . $row, $employee->first_name);
            $sheet->setCellValue('B' . $row, $employee->last_name);
            $sheet->setCellValue('C' . $row, $employee->email);
            $sheet->setCellValue('D' . $row, $employee->phone);
            $sheet->setCellValue('E' . $row, $employee->dob);
            $sheet->setCellValue('F' . $row, $employee->hiring_date);
            $sheet->setCellValue('G' . $row, $employee->experience);
            $sheet->setCellValue('H' . $row, $employee->address);
            $sheet->setCellValue('I' . $row, $employee->zip_code);
            $sheet->setCellValue('J' . $row, $employee->city);
            $sheet->setCellValue('K' . $row, $employee->role);
            $sheet->setCellValue('L' . $row, $employee->availability);
            $sheet->setCellValue('M' . $row, $employee->status);
            // Add other fields as needed
            $row++;
        }

        $writer = new Xlsx($spreadsheet);
        $fileName = 'employees.xlsx';

        // Redirect output to a client’s web browser (Xlsx)
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $fileName . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx',
        ]);

        $file = $request->file('file');
        $spreadsheet = IOFactory::load($file->getPathname());
        $sheetData = $spreadsheet->getActiveSheet()->toArray(null, true, true, true);

        foreach ($sheetData as $index => $row) {
            if ($index === 1) continue; // Skip header row

            Employee::updateOrCreate(
                ['email' => $row['C']], // Assuming email is unique
                [
                    'first_name' => $row['A'],
                    'last_name' => $row['B'],
                    'phone' => $row['D'],
                    'dob' => $row['E'],
                    'hiring_date' => $row['F'],
                    'experience' => $row['G'],
                    'address' => $row['H'],
                    'zip_code' => $row['I'],
                    'city' => $row['J'],
                    'role' => $row['K'],
                    'availability' => $row['L'],
                    'status' => $row['M'],
                ]
            );
        }

        return redirect()->route('employee')->with('success', 'Employees imported successfully.');
    }

}
