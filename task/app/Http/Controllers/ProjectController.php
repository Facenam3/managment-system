<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();

        return view('projects.projects', compact('projects'));
    }

    public function create() {
        return view('projects.project-create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'description' => ['nullable' ,'string', 'max:255'],
            'due_date' => ['nullable','date','max:255']
        ]);

        $project = Project::create([
            'name' => $request->name,
            'description' => $request->description,
            'due_date' => $request->due_date
        ]);

        return response()->json([
            'message' => 'Project created successfully',
            'project' => $project
        ],201);
    }

    public function allProjects() {
        $allProjects = Project::all();

        return response()->json([
            'message' => 'Returning all projects',
            'project' => $allProjects
        ],201);
    }

    public function filterByDueDate() {
        $allProjects = Project::where('due_date')->get();

        return response()->json([
            'message' => 'Filtering all projects by due date',
            'project' => $allProjects
        ],201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
