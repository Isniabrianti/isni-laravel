<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Buku::where('JudulBuku', 'like', '%' . $query . '%')
                        ->orWhere('JenisBuku', 'like', '%' . $query . '%')
                        ->orWhere('Penulis', 'like', '%' . $query . '%')
                        ->orWhere('Episode', 'like', '%' . $query . '%')
                        ->get();

        return view('search.results', ['results' => $results, 'query' => $query]);
    }
}