<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::with('category', 'tools')->latest()->get();
        return view('template', [
            'title' => 'SemuaBeli | Pilihan Template',
            'projects' => $project,
        ]);
    }
    public function show($slug)
    {
        $project = Project::where('slug', $slug)->with('category', 'tools')->firstOrFail();
        return view('project-details', [
            'title' => $project->name,
            'project' => $project,
        ]);
    }
    public function download($file)
    {
        $filePath = 'public/' . $file;

        // Debugging: Dump the file path to check if it's correct
        // dd(storage_path('app/' . $filePath));

        if (Storage::exists($filePath)) {
            return response()->download(storage_path('app/' . $filePath));
        } else {
            return redirect()->back()->with('error', 'File not found!');
        }
    }
}
