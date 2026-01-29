<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FacilityController extends Controller
{
    //
    private array $facilities = [
        [
            'id' => 'f1',
            'name' => 'Lab Komputer MA',
            'type' => 'Ruang',
            'description' => 'Laboratorium modern untuk riset IT.',
            'imageUrl' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998',
            'jenjang' => 'MA',
        ],
        [
            'id' => 'f2',
            'name' => 'Perpustakaan Digital',
            'type' => 'Ruang',
            'description' => 'Akses e-book dan jurnal akademik.',
            'imageUrl' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f',
            'jenjang' => 'KAMPUS',
        ],
        [
            'id' => 'f3',
            'name' => 'Studio Multimedia',
            'type' => 'Ruang',
            'description' => 'Produksi konten dakwah dan edukasi digital.',
            'imageUrl' => 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2',
            'jenjang' => 'KAMPUS',
        ],
        [
            'id' => 'f4',
            'name' => 'Lapangan Olahraga',
            'type' => 'Fasilitas Umum',
            'description' => 'Futsal, basket, dan olahraga sunnah.',
            'imageUrl' => 'https://images.unsplash.com/photo-1508609349937-5ec4ae374ebf',
            'jenjang' => 'MA',
        ],
        [
            'id' => 'f5',
            'name' => 'Robotik MA',
            'type' => 'Ekstrakurikuler',
            'description' => 'Pengembangan teknologi robotika.',
            'imageUrl' => 'https://images.unsplash.com/photo-1561557944-6e7860d1a7eb',
            'jenjang' => 'MA',
        ],
    ];

    public function index()
    {
        return response()->json([
            'data' => $this->facilities
        ]);
    }

    public function show($id)
    {
        $item = collect($this->facilities)->firstWhere('id', $id);

        if (!$item) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json(['data' => $item]);
    }

    public function limit($count)
    {
        $limitedFacilities = array_slice($this->facilities, 0, $count);
        return response()->json(['data' => $limitedFacilities]);
    }
}
