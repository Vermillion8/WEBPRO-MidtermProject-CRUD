<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use DateTime;
use Illuminate\Support\Facades\DB;
use App\Models\Category; 

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->orderBy('created_at', 'desc')->get();

        return view('home', [
            "title" => "Home",
            "posts" => $posts
        ]);
    }

    public function slugify($text, string $divider = '-') {
        $now = new DateTime();
        $timestamp = $now->format('YmdHis');
    
        // replace non letter or digits by divider
        $text = preg_replace('~[^\pL\d]+~u', $divider, $text);
    
        // transliterate
        $text = iconv('utf-8', 'us-ascii//TRANSLIT', $text);
    
        // remove unwanted characters
        $text = preg_replace('~[^-\w]+~', '', $text);
    
        // trim
        $text = trim($text, $divider);
    
        // remove duplicate divider
        $text = preg_replace('~-+~', $divider, $text);
    
        // lowercase
        $text = strtolower($text);
    
        if (empty($text)) {
          $text = 'n-a';
        }
    
        // trim slug to max 128 characters
        $slug = $timestamp . $divider . $text;
        $slug = substr($slug, 0, 128);
    
        return $slug;
    }

    public function show(Post $post)
    {
        // Load the category relationship for the post
        $post->load('category');
    
        return view('post', [
            "title" => "Single Post",
            "post" => $post,
            "selectedCategory" => $post->category, 
        ]);
    }

    public function newpost(Request $request)
    {
    $categories = Category::all();

    // Check if a category has been selected in the form
    $selectedCategory = $request->input('category_id');

    return view('newpost', [
        "title" => "New Post",
        "categories" => $categories,
        "selectedCategory" => $selectedCategory,
    ]);
    }


    public function store(Request $request)
{
    $validatedData = $request->validate([
        'text' => 'required|max:150',
        'category_id' => 'nullable|exists:categories,id', // Validate the category ID
    ]);

    $time_now = now();

    DB::table('posts')->insert([
        'user_id' => auth()->user()->id,
        'text' => $validatedData['text'],
        'category_id' => $validatedData['category_id'], // Associate the category
        'slug' => $this->slugify($validatedData['text']),
        'created_at' => $time_now,
        'updated_at' => $time_now,
    ]);

    return redirect('/');
}


    public function destroy(Request $request)
    {
        $post_id = $request['post_id'];
        Post::destroy($post_id);
        Comment::where('post_id', $post_id)->delete();
        return redirect('/')->with('deletePostSuccess', "Post deleted");
    }

    public function edit(Request $request)
    {
        $post = Post::findOrFail($request['post_id']);

        return view('editpost', [
            "title" => "Edit Post",
            "post" => $post,
        ]);
    }

    public function save_edit(Request $request)
    {
        $post = Post::findOrFail($request['post_id']);
        $post->text = $request['text'];
        $post->save();

        return redirect('/post/' . $post->slug);
    }

    public function search(Request $request)
    {
    $keyword = $request->input('keyword');
    
    // Query your posts with a where clause to filter results
    $posts = Post::where('text', 'like', '%' . $keyword . '%')->get();
    
    return view('home', ['posts' => $posts, 'keyword' => $keyword]);
    }

}
?>
?>