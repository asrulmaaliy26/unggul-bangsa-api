<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JournalController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Journal::all()]);
    }

    public function show($id)
    {
        $item = Journal::find($id);

        if (!$item) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json(['data' => $item]);
    }

    public function limit($count)
    {
        $limitedJournals = Journal::limit($count)->get();
        return response()->json(['data' => $limitedJournals]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'abstract' => 'required|string',
            'author' => 'required|string|max:255',
            'mentor' => 'required|string|max:255',
            'score' => 'required|integer|min:0|max:100',
            'date' => 'required|date',
            'is_best' => 'nullable|boolean',
            'jenjang' => 'required|string',
            'documentUrl' => 'nullable|file|mimes:pdf|max:10240', // Max 10MB
        ]);

        /** ======================
         * Upload DOCUMENT PDF (optional)
         * ====================== */
        $documentUrl = null;

        if ($request->hasFile('documentUrl')) {
            $documentPath = $request->file('documentUrl')
                ->store('journals/documents', 'public');
            $documentUrl = url('storage/' . $documentPath);
        }

        $journal = Journal::create([
            'title' => $request->title,
            'category' => $request->category,
            'abstract' => $request->abstract,
            'author' => $request->author,
            'mentor' => $request->mentor,
            'score' => $request->score,
            'date' => $request->date,
            'is_best' => $request->input('is_best', false),
            'jenjang' => $request->jenjang,
            'documentUrl' => $documentUrl,
        ]);

        return response()->json([
            'message' => 'Jurnal berhasil ditambahkan',
            'data' => $journal,
        ], 201);
    }
}
