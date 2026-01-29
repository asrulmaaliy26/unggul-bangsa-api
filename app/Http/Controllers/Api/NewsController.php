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
        'title' => 'Siswa MA Menangkan Olimpiade Sains Nasional',
        'excerpt' => 'Prestasi membanggakan kembali diraih oleh siswa MA...',
        'content' => 'Isi berita lengkap tentang kemenangan Olimpiade Sains Nasional.',
        'date' => '24 Mei 2024',
        'views' => 1250,
        'imageUrl' => 'https://images.unsplash.com/photo-1546410531-bb4caa6b424d',
        'category' => 'Prestasi',
        'jenjang' => 'MA',
    ],
    [
        'id' => '2',
        'title' => 'Lomba Mewarnai MI Unggul Bangsa',
        'excerpt' => 'Keceriaan santri MI dalam lomba mewarnai...',
        'content' => 'Isi berita lengkap kegiatan lomba mewarnai MI.',
        'date' => '10 Mei 2024',
        'views' => 500,
        'imageUrl' => 'https://images.unsplash.com/photo-1503454537195-1dcabb73ffb9',
        'category' => 'Kegiatan',
        'jenjang' => 'MI',
    ],
    [
        'id' => '3',
        'title' => 'Workshop AI untuk Guru MA',
        'excerpt' => 'Peningkatan kompetensi guru melalui workshop AI...',
        'content' => 'Pelatihan pemanfaatan Artificial Intelligence dalam pembelajaran.',
        'date' => '5 Mei 2024',
        'views' => 820,
        'imageUrl' => 'https://images.unsplash.com/photo-1523580846011-d3a5bc25702b',
        'category' => 'Pelatihan',
        'jenjang' => 'MA',
    ],
    [
        'id' => '4',
        'title' => 'Santri MTs Juara Tahfidz Se-Kabupaten',
        'excerpt' => 'Hafalan Al-Qur’an santri MTs tembus tingkat kabupaten...',
        'content' => 'Prestasi santri MTs dalam lomba tahfidz.',
        'date' => '2 Mei 2024',
        'views' => 940,
        'imageUrl' => 'https://images.unsplash.com/photo-1604882357278-7c5d2b8a52b8',
        'category' => 'Prestasi',
        'jenjang' => 'SMPT',
    ],
    [
        'id' => '5',
        'title' => 'Peringatan Isra Mi’raj Bersama Seluruh Jenjang',
        'excerpt' => 'Peringatan Isra Mi’raj berlangsung khidmat...',
        'content' => 'Kegiatan keagamaan Isra Mi’raj melibatkan seluruh jenjang.',
        'date' => '28 April 2024',
        'views' => 1500,
        'imageUrl' => 'https://images.unsplash.com/photo-1544717305-2782549b5136',
        'category' => 'Keagamaan',
        'jenjang' => 'UMUM',
    ],
    [
        'id' => '6',
        'title' => 'Ekstrakurikuler Robotik MA Raih Juara Regional',
        'excerpt' => 'Tim robotik MA menunjukkan inovasi luar biasa...',
        'content' => 'Prestasi ekstrakurikuler robotik tingkat regional.',
        'date' => '20 April 2024',
        'views' => 1100,
        'imageUrl' => 'https://images.unsplash.com/photo-1581092919534-1c6c7f0d6f47',
        'category' => 'Prestasi',
        'jenjang' => 'MA',
    ],
    [
        'id' => '7',
        'title' => 'Outing Class MI ke Museum Sains',
        'excerpt' => 'Belajar sambil bermain di Museum Sains...',
        'content' => 'Kegiatan outing class MI ke museum.',
        'date' => '15 April 2024',
        'views' => 430,
        'imageUrl' => 'https://images.unsplash.com/photo-1588072432836-e10032774350',
        'category' => 'Kegiatan',
        'jenjang' => 'MI',
    ],
    [
        'id' => '8',
        'title' => 'Seminar Parenting Islami untuk Wali Santri',
        'excerpt' => 'Penguatan peran orang tua dalam pendidikan anak...',
        'content' => 'Seminar parenting berbasis nilai Islam.',
        'date' => '8 April 2024',
        'views' => 670,
        'imageUrl' => 'https://images.unsplash.com/photo-1522202176988-66273c2fd55f',
        'category' => 'Seminar',
        'jenjang' => 'UMUM',
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

    public function limit($count)
    {
        $limitedNews = array_slice($this->news, 0, $count);
        return response()->json(['data' => $limitedNews]);
    }
}
