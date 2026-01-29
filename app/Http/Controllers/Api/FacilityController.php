<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    //
    public function index()
    {
        return response()->json([
            'data' => [
                [
                    'id' => 'f1',
                    'name' => 'Lab Komputer SMA',
                    'type' => 'Ruang',
                    'description' => 'Lab modern IT',
                    'imageUrl' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998',
                    'jenjang' => 'SMA'
                ]
            ]
        ]);
    }
}
