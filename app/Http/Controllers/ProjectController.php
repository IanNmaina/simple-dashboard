<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{

    public function index()
    {
        $projects = Project::paginate(10);
        return view('welcome', compact('projects'));
    }
    public function createProject()
    {

        return view('projects.create');
    }

    public function store(Request $request)
    {
        // Validate the request inputs
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'deadline' => 'required|date',
        ]);

        // Create the project and store the result
        $project = Project::create($request->all());

        // Check if the project was successfully created
        if ($project) {
            return redirect()->route('projects.index')->with('success', 'Project created successfully!');
        } else {
            return redirect()->back()->with('error', 'Failed to create the project.');
        }
    }


    public function update(Request $request, Project $project)
    {
        $request->validate([
            'name' => 'required',
            'status' => 'required',
            'deadline' => 'required|date',
        ]);

        $project->update($request->all());

        return redirect()->route('projects.index')->with('success', 'Project updated successfully.');
    }

    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('projects.index')->with('success', 'Project deleted successfully!');
    }

    public function edit($id)
    {
        // Find the project by ID
        $project = Project::findOrFail($id);

        // Return a view for editing the project
        return view('projects.edit', compact('project'));
    }
}
