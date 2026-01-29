<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Project::all()]);
    }

    public function show($id)
    {
        $item = Project::find($id);

        if (!$item) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json(['data' => $item]);
    }

    public function limit($count)
    {
        $limitedProjects = Project::limit($count)->get();
        return response()->json(['data' => $limitedProjects]);
    }
}
