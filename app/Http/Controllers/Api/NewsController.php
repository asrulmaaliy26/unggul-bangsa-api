<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        return response()->json(['data' => News::all()]);
    }

    public function show($id)
    {
        $item = News::find($id);

        if (!$item) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json(['data' => $item]);
    }

    public function limit($count)
    {
        $limitedNews = News::limit($count)->get();
        return response()->json(['data' => $limitedNews]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'excerpt' => 'required|string',
            'content' => 'required|string',
            'date' => 'required|date',
            'category' => 'required|string',
            'jenjang' => 'required|string',
            'main_image' => 'required|image|max:2048',
            'gallery.*' => 'nullable|image|max:2048',
        ]);

        /** ======================
         * Upload MAIN IMAGE
         * ====================== */
        $mainImagePath = $request->file('main_image')
            ->store('news/main', 'public');

        /** ======================
         * Upload GALLERY (optional)
         * ====================== */
        $galleryPaths = [];

        if ($request->hasFile('gallery')) {
            foreach ($request->file('gallery') as $image) {
                $galleryPaths[] = $image->store('news/gallery', 'public');
            }
        }

        /** ======================
         * Simpan ke DB dengan FULL URL
         * ====================== */
        $news = News::create([
            'title' => $request->title,
            'excerpt' => $request->excerpt,
            'content' => $request->input('content'),
            'date' => $request->date,
            'views' => 0,
            'category' => $request->category,
            'jenjang' => $request->jenjang,
            'main_image' => url('storage/' . $mainImagePath),
            'gallery' => collect($galleryPaths)->map(fn ($p) => url('storage/' . $p))->toArray(),
        ]);

        return response()->json([
            'message' => 'Berita berhasil ditambahkan',
            'data' => $news,
        ], 201);
    }
}
