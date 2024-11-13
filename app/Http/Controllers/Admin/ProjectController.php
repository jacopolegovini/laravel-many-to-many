<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjectRequest;
use App\Http\Requests\UpdateProjectRequest;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $types = Type::all();
        $technologies = Technology::all();
        return view('admin.projects.create', compact('types', 'technologies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProjectRequest $request)
    {
        $data = $request->validated();

        $filePath = Storage::disk('public')->put('img/projects/', $request->img);
        $data['img'] = $filePath;

        $project = Project::create($data);
        $project->technologies()->attach($data['technologies']);
        return redirect()->route('admin.projects.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $projects = Project::findOrFail($id);
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.show', compact('projects', 'types', 'technologies'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $projects = Project::findOrFail($id);
        $types = Type::all();
        $technologies = Technology::all();

        return view('admin.projects.edit', compact('projects', 'types', 'technologies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProjectRequest $request, string $id)
    {
        $projects = Project::findOrFail($id);
        $projects->update($request->validated());
        // $projects->technologies()->attach($id);

        return redirect()->route('admin.projects.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $projects = Project::findOrFail($id);
        $projects->delete();

        return redirect()->route('admin.projects.index');
    }
}
