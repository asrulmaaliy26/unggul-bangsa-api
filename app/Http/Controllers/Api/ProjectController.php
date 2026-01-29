<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    //
    private array $projects = [
        [
            'id' => 'p1',
            'title' => 'Irigasi IoT MA',
            'category' => 'Sains & Teknologi',
            'description' => 'Sistem irigasi otomatis berbasis IoT untuk pertanian sekolah.',
            'author' => 'Tim MA',
            'date' => 'Mei 2024',
            'imageUrl' => 'https://images.unsplash.com/photo-1518770660439-4636190af475',
            'jenjang' => 'MA',
        ],
        [
            'id' => 'p2',
            'title' => 'Irigasi IoT MI',
            'category' => 'Sains & Teknologi',
            'description' => 'Pengenalan sistem irigasi otomatis sederhana untuk siswa MI.',
            'author' => 'Tim MI',
            'date' => 'Mei 2024',
            'imageUrl' => 'https://images.unsplash.com/photo-1518770660439-4636190af475',
            'jenjang' => 'MI',
        ],
        [
            'id' => 'p3',
            'title' => 'Robot Pembersih Masjid',
            'category' => 'Sains & Teknologi',
            'description' => 'Robot otomatis untuk membersihkan lantai masjid sekolah.',
            'author' => 'Ekstrakurikuler Robotik MA',
            'date' => 'April 2024',
            'imageUrl' => 'https://images.unsplash.com/photo-1581091012184-5c7c41c6e0c6',
            'jenjang' => 'MA',
        ],
        [
            'id' => 'p4',
            'title' => 'Aplikasi Hafalan Qur’an',
            'category' => 'Keagamaan',
            'description' => 'Aplikasi mobile untuk monitoring hafalan Al-Qur’an santri.',
            'author' => 'Tim Riset Kampus',
            'date' => 'April 2024',
            'imageUrl' => 'https://images.unsplash.com/photo-1509021436665-8f07dbf5bf1d',
            'jenjang' => 'KAMPUS',
        ],
        [
            'id' => 'p5',
            'title' => 'Komposter Digital Sekolah',
            'category' => 'Lingkungan',
            'description' => 'Pengolahan sampah organik sekolah berbasis sensor.',
            'author' => 'Tim MTs',
            'date' => 'Maret 2024',
            'imageUrl' => 'https://images.unsplash.com/photo-1582719478250-c89cae4dc85b',
            'jenjang' => 'SMPT',
        ],
        [
            'id' => 'p6',
            'title' => 'Website Profil Sekolah',
            'category' => 'Teknologi Informasi',
            'description' => 'Pengembangan website profil sekolah berbasis React & Laravel.',
            'author' => 'Tim IT MA',
            'date' => 'Maret 2024',
            'imageUrl' => 'https://images.unsplash.com/photo-1498050108023-c5249f4df085',
            'jenjang' => 'MA',
        ],
        [
            'id' => 'p7',
            'title' => 'Media Pembelajaran Interaktif MI',
            'category' => 'Pendidikan',
            'description' => 'Media pembelajaran berbasis animasi untuk siswa MI.',
            'author' => 'Guru MI',
            'date' => 'Februari 2024',
            'imageUrl' => 'https://images.unsplash.com/photo-1513258496099-48168024aec0',
            'jenjang' => 'MI',
        ],
        [
            'id' => 'p8',
            'title' => 'Sistem Absensi QR Code',
            'category' => 'Teknologi Informasi',
            'description' => 'Sistem absensi santri menggunakan QR Code dan dashboard web.',
            'author' => 'Tim MA',
            'date' => 'Februari 2024',
            'imageUrl' => 'https://images.unsplash.com/photo-1555066931-4365d14bab8c',
            'jenjang' => 'MA',
        ],
    ];

    public function index()
    {
        return response()->json([
            'data' => $this->projects
        ]);
    }

    public function show($id)
    {
        $item = collect($this->projects)->firstWhere('id', $id);

        if (!$item) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json(['data' => $item]);
    }

    public function limit($count)
    {
        $limitedProjects = array_slice($this->projects, 0, $count);
        return response()->json(['data' => $limitedProjects]);
    }
}
