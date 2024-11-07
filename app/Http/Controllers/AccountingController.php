<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Project;
use App\Models\Notification;
use Illuminate\Http\Request;

class AccountingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $invoices = Invoice::with('project')->paginate(10);
        return view('accounting.index', compact('invoices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $projects = Project::all();
        return view('accounting.create', compact('projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'invoice_number' => 'required|string|unique:invoices',
            'invoice_date' => 'required|date',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
            'project_id' => 'required|exists:projects,id',
            'balance_owed' => 'required|numeric',
            'status' => 'required|string',
            'type' => 'required|string',
            'private_note' => 'nullable|string',
            'custom_name' => 'nullable|string',
        ]);

        Invoice::create($validatedData);

        Notification::create([
            'type' => 'invoice',
            'message' => 'New Invoice created for ' . $project->name . ' by ' . auth()->user()->name,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('accounting.index')->with('success', 'Invoice created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $invoice = Invoice::findOrFail($id);
        $projects = Project::all();
        return view('accounting.edit', compact('invoice', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invoice $invoice)
    {
        $validatedData = $request->validate([
            'invoice_number' => 'required|unique:invoices,invoice_number,' . $invoice->id,
            'invoice_date' => 'required|date',
            'amount' => 'required|numeric',
            'due_date' => 'required|date',
            'project_id' => 'required|exists:projects,id',
            'balance_owed' => 'required|numeric',
            'status' => 'required|in:Pending,Paid,Overdue',
            'type' => 'required',
        ]);

        $invoice->update($validatedData);

        return redirect()->route('accounting.index')->with('success', 'Invoice updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invoice $invoice)
    {
        $invoice->delete();
        return redirect()->route('accounting.index')->with('success', 'Invoice deleted successfully.');
    }
}
