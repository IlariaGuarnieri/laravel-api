<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Project;

class ProjectController extends Controller
{
    public function index()
    {
        $projects = Project::all();

        return response()->json($projects);

        //non uso compact perche devo passare solo un dato, ovvero projects, se devo passare piu di un dato uso compact
    }

    public function getProjectBySlug($slug)
    {
        $project = Project::where('slug', $slug)->with('technologies')->first();
        if ($project) {
            $success = true;
            if ($project->image) {
                $project->image = asset('storage/' . $project->image);
            } else {
                $project->image = asset('storage/uploads/no-image.jpeg');
                $project->original_image = 'no-image';
            }
        } else {
            $success = false;
        }
        return response()->json(compact('project', 'success'));
        // dd($slug);
    }
}
