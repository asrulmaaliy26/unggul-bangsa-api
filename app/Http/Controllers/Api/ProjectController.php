<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    public function index()
    {
        return response()->json([
            'data' => [
                [
                    'id' => 'p1',
                    'title' => 'Irigasi IoT MA',
                    'category' => 'Sains & Teknologi',
                    'description' => 'Sistem irigasi otomatis berbasis IoT',
                    'author' => 'Tim MA',
                    'date' => 'Mei 2024',
                    'imageUrl' => 'https://images.unsplash.com/photo-1518770660439-4636190af475',
                    'jenjang' => 'MA'
                ]
            ]
        ]);
    }

    public function show($id)
    {
        return response()->json(['message' => 'detail nanti']);
    }
}
