<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Project::all()]);
    }

    public function show($id)
    {
        $item = Project::find($id);

        if (!$item) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json(['data' => $item]);
    }

    public function limit($count)
    {
        $limitedProjects = Project::limit($count)->get();
        return response()->json(['data' => $limitedProjects]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'category' => 'required|string',
            'description' => 'required|string',
            'author' => 'required|string',
            'date' => 'required|date',
            'jenjang' => 'required|string',
            'imageUrl' => 'required|image|max:2048',
            'documents.*' => 'nullable|file|mimes:pdf,doc,docx,xls,xlsx,ppt,pptx|max:5120',
            'document_types.*' => 'nullable|string',
            'document_titles.*' => 'nullable|string',
        ]);

        /** ======================
         * Upload IMAGE
         * ====================== */
        $imagePath = $request->file('imageUrl')
            ->store('projects/images', 'public');

        /** ======================
         * Upload DOCUMENTS (optional)
         * ====================== */
        $documentsData = [];

        if ($request->hasFile('documents')) {
            $documents = $request->file('documents');
            $documentTypes = $request->input('document_types', []);
            $documentTitles = $request->input('document_titles', []);

            foreach ($documents as $index => $document) {
                $path = $document->store('projects/documents', 'public');
                $extension = $document->getClientOriginalExtension();
                $originalName = pathinfo($document->getClientOriginalName(), PATHINFO_FILENAME);

                $documentsData[] = [
                    'url' => url('storage/' . $path),
                    'type' => $documentTypes[$index] ?? 'document',
                    'title' => $documentTitles[$index] ?? $originalName,
                    'format' => strtolower($extension),
                ];
            }
        }

        /** ======================
         * Simpan ke DB dengan FULL URL
         * ====================== */
        $project = Project::create([
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'author' => $request->author,
            'date' => $request->date,
            'jenjang' => $request->jenjang,
            'imageUrl' => url('storage/' . $imagePath),
            'documents' => $documentsData,
        ]);

        return response()->json([
            'message' => 'Proyek berhasil ditambahkan',
            'data' => $project,
        ], 201);
    }
}

