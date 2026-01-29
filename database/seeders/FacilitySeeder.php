<?php

namespace Database\Seeders;

use App\Models\Facility;
use Illuminate\Database\Seeder;

class FacilitySeeder extends Seeder
{
    public function run(): void
    {
        $facilities = [
            [
                'name' => 'Lab Komputer MA',
                'type' => 'Ruang',
                'description' => 'Laboratorium modern untuk riset IT.',
                'image_url' => 'https://images.unsplash.com/photo-1531482615713-2afd69097998',
                'education_level' => 'MA',
            ],
            [
                'name' => 'Perpustakaan Digital',
                'type' => 'Ruang',
                'description' => 'Akses e-book dan jurnal akademik.',
                'image_url' => 'https://images.unsplash.com/photo-1524995997946-a1c2e315a42f',
                'education_level' => 'KAMPUS',
            ],
            [
                'name' => 'Studio Multimedia',
                'type' => 'Ruang',
                'description' => 'Produksi konten dakwah dan edukasi digital.',
                'image_url' => 'https://images.unsplash.com/photo-1515378791036-0648a3ef77b2',
                'education_level' => 'KAMPUS',
            ],
            [
                'name' => 'Lapangan Olahraga',
                'type' => 'Fasilitas Umum',
                'description' => 'Futsal, basket, dan olahraga sunnah.',
                'image_url' => 'https://images.unsplash.com/photo-1508609349937-5ec4ae374ebf',
                'education_level' => 'MA',
            ],
            [
                'name' => 'Robotik MA',
                'type' => 'Ekstrakurikuler',
                'description' => 'Pengembangan teknologi robotika.',
                'image_url' => 'https://images.unsplash.com/photo-1561557944-6e7860d1a7eb',
                'education_level' => 'MA',
            ],
        ];

        foreach ($facilities as $item) {
            Facility::create($item);
        }
    }
}
