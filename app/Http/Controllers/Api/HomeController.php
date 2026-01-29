<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index()
    {
        return response()->json([
            'stats' => [
                ['label' => 'Total Murid', 'value' => '2,400'],
                ['label' => 'Guru & Dosen', 'value' => '150'],
                ['label' => 'Gedung', 'value' => '12'],
                ['label' => 'Alumni', 'value' => '10k+'],
            ],
            'slides' => [
                [
                    'image' => 'https://images.unsplash.com/photo-1546410531-bb4caa6b424d',
                    'title' => 'Membangun Generasi Qurani',
                    'subtitle' => 'Integrasi ilmu modern dengan Al-Quran.'
                ],
                [
                    'image' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9',
                    'title' => 'Pendidikan Berkualitas',
                    'subtitle' => 'Berdedikasi tinggi untuk masa depan gemilang.'
                ],
                [
                    'image' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9',
                    'title' => 'Inovasi Tanpa Batas',
                    'subtitle' => 'Riset dan teknologi dalam bingkai keislaman.'
                ],
            ]
        ]);
    }
}
