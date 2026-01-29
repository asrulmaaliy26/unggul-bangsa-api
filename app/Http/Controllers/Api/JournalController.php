<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Journal;
use Illuminate\Http\Request;

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
}
