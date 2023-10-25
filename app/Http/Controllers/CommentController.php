<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\DB;

class CommentController extends Controller 
{

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'text' => 'required|max:150',
        ]);

        $time_now = now();

        DB::table('comments')->insert([
            'text' => $validatedData['text'],
            'user_id' => auth()->user()->id,
            'post_id' => $request['post_id'],
            'created_at' => $time_now,
            'updated_at' => $time_now,
        ]);

        $post = Post::findOrFail($request['post_id']);
        $slug = $post->slug;    

        return redirect("/post/" . $slug);
    }
}
?>