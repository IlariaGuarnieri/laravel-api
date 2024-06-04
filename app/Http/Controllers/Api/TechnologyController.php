<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Technology;

class TechnologyController extends Controller
{

    public function index()
    {
        $technologies = Technology::all();

        return response()->json($technologies);

        //non uso compact perche devo passare solo un dato, ovvero projects, se devo passare piu di un dato uso compact
    }
}
