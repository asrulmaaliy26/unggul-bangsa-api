<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    //
    public function show($jenjang)
    {
        return response()->json([
            'data' => [
                'history' => "Sejarah $jenjang Unggul Bangsa",
                'visi' => "Visi $jenjang",
                'misi' => [
                    'Pendidikan Islami',
                    'Teknologi Modern'
                ]
            ]
        ]);
    }
}
