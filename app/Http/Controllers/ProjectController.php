<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Contractor;
use App\Models\Employee;
use App\Models\Notification;
use Illuminate\Http\Request;
use PDF; // Import the PDF facade

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::paginate(10);
        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $contractors = Contractor::all();
        $projectManagers = Employee::where('role', 'Project Manager')->get();
        \Log::info('Project Managers:', $projectManagers->toArray());

        return view('projects.create', compact('contractors', 'projectManagers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        \Log::info('Store method called');

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'contractor_id' => 'required|exists:contractors,id',
            'foreman' => 'required|string|max:255',
            'project_manager_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'amount' => 'required|numeric',
            'status' => 'required|string|max:255',
        ]);

        // Create the project and capture the instance
        $project = Project::create($validatedData);

        // Create the notification using the project instance
        Notification::create([
            'type' => 'project',
            'message' => 'New Project created for ' . $project->name . ' by ' . auth()->user()->name,
            'user_id' => auth()->id(),
        ]);

        \Log::info('Project created successfully');

        return redirect()->route('projects.index')->with('success', 'Project added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        $project->load('manager', 'contractor');
        $documents = $project->documents()->paginate(5);
        return view('projects.show', compact('project', 'documents'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        $contractors = Contractor::all();
        $projectManagers = Employee::where('role', 'Project Manager')->get();
        \Log::info('Project Managers:', $projectManagers->toArray());

        return view('projects.edit', compact('project', 'contractors', 'projectManagers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'contractor_id' => 'required|exists:contractors,id',
            'foreman' => 'required|string|max:255',
            'project_manager_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date',
            'amount' => 'required|numeric',
            'status' => 'required|string|max:50',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.show', $project)->with('success', 'Project updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function exportPdf()
    {
        $projects = Project::all(); // Fetch all projects or apply any necessary filters

        $pdf = PDF::loadView('projects.export_pdf', compact('projects'));

        return $pdf->download('projects.pdf');
    }
}
