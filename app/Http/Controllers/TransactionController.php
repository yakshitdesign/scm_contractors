<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Employee;
use App\Models\Project;
use App\Models\Notification;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with(['employee', 'project'])->paginate(10);
        return view('transactions.index', compact('transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employees = Employee::all();
        $projects = Project::all();
        return view('transactions.create', compact('employees', 'projects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'transaction_type' => 'required|string',
            'payment_type' => 'required|string',
            'date' => 'required|date',
            'business' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'employee_id' => 'required|exists:employees,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        Transaction::create($validatedData);

        $project = Project::find($validatedData['project_id']);

        Notification::create([
            'type' => 'transaction',
            'message' => 'New Transaction created for ' . $project->name . ' by ' . auth()->user()->name,
            'user_id' => auth()->id(),
        ]);

        return redirect()->route('transactions.index')->with('success', 'Transaction created successfully.');
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
    public function edit(Transaction $transaction)
    {
        $employees = Employee::all();
        $projects = Project::all();
        return view('transactions.edit', compact('transaction', 'employees', 'projects'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        $validatedData = $request->validate([
            'transaction_type' => 'required|string',
            'payment_type' => 'required|string',
            'date' => 'required|date',
            'business' => 'required|string',
            'description' => 'nullable|string',
            'amount' => 'required|numeric',
            'employee_id' => 'required|exists:employees,id',
            'project_id' => 'required|exists:projects,id',
        ]);

        $transaction->update($validatedData);

        return redirect()->route('transactions.index')->with('success', 'Transaction updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        $transaction->delete();
        return redirect()->route('transactions.index')->with('success', 'Transaction deleted successfully.');
    }
}
