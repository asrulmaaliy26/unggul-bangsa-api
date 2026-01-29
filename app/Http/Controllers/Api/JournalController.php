<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JournalController extends Controller
{
    //
    public function index()
    {
        return response()->json([
            'data' => [
                [
                    'id' => 'j1',
                    'title' => 'Zakat & Ekonomi Digital',
                    'category' => 'Ekonomi Syariah',
                    'abstract' => 'Studi efisiensi pengelolaan zakat via aplikasi.',
                    'author' => 'Ahmad Mahasiswa',
                    'mentor' => 'Dr. Zainal',
                    'score' => 98,
                    'date' => 'Juni 2024',
                    'isBest' => true,
                    'jenjang' => 'KAMPUS',
                ],
                [
                    'id' => 'j2',
                    'title' => 'Eksperimen Bio-Gas Sekolah',
                    'category' => 'Sains Terapan',
                    'abstract' => 'Pemanfaatan limbah kantin menjadi energi.',
                    'author' => 'Siswa MA',
                    'mentor' => 'Guru Kimia',
                    'score' => 92,
                    'date' => 'Mei 2024',
                    'isBest' => false,
                    'jenjang' => 'MA',
                ],
                [
                    'id' => 'j3',
                    'title' => 'AI untuk Prediksi Cuaca Lokal',
                    'category' => 'Teknologi Informasi',
                    'abstract' => 'Implementasi machine learning untuk prediksi cuaca.',
                    'author' => 'Tim Riset Kampus',
                    'mentor' => 'Dr. Fikri',
                    'score' => 95,
                    'date' => 'April 2024',
                    'isBest' => false,
                    'jenjang' => 'KAMPUS',
                ],
                [
                    'id' => 'j4',
                    'title' => 'Pengaruh Tahfidz terhadap Prestasi Akademik',
                    'category' => 'Pendidikan Islam',
                    'abstract' => 'Analisis korelasi hafalan Al-Qur’an dan nilai akademik.',
                    'author' => 'Siswa MA',
                    'mentor' => 'Ust. Hasan',
                    'score' => 90,
                    'date' => 'Maret 2024',
                    'isBest' => false,
                    'jenjang' => 'MA',
                ],
            ]
        ]);
    }
}
