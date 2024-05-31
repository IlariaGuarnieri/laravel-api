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
}
