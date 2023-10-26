<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;


class SearchController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        // Perform a search query using the $keyword
        $posts = Post::where('text', 'like', "%$keyword%")->get();

        return view('search-results', compact('posts', 'keyword'));
    }
}
