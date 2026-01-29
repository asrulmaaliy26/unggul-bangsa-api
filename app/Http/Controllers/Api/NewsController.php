<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //
    private array $news = [
        [
            'id' => '1',
            'title' => 'Siswa SMA Menangkan Olimpiade Sains Nasional',
            'excerpt' => 'Prestasi membanggakan kembali diraih...',
            'content' => 'Isi berita lengkap...',
            'date' => '24 Mei 2024',
            'views' => 1250,
            'imageUrl' => 'https://images.unsplash.com/photo-1546410531-bb4caa6b424d',
            'category' => 'Prestasi',
            'jenjang' => 'SMA'
        ],
        [
            'id' => '2',
            'title' => 'Lomba Mewarnai MI Unggul Bangsa',
            'excerpt' => 'Keceriaan santri MI...',
            'content' => 'Isi berita MI...',
            'date' => '10 Mei 2024',
            'views' => 500,
            'imageUrl' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9',
            'category' => 'Kegiatan',
            'jenjang' => 'MI'
        ],
    ];

    public function index()
    {
        return response()->json(['data' => $this->news]);
    }

    public function show($id)
    {
        $item = collect($this->news)->firstWhere('id', $id);

        if (!$item) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json(['data' => $item]);
    }
}
