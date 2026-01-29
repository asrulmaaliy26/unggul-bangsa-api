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
                    'abstract' => 'Studi efisiensi zakat...',
                    'author' => 'Ahmad',
                    'mentor' => 'Dr. Zainal',
                    'score' => 98,
                    'date' => 'Juni 2024',
                    'isBest' => true,
                    'jenjang' => 'KAMPUS'
                ]
            ]
        ]);
    }
}
