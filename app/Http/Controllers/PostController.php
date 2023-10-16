<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Post::all();
        return response()->json(['data' => $data]);
    }
    public function show(Post $post)
    {
        $data = Post::find($post);
        return response()->json(['data' => $data]);
    }
    public function postByTags($tags)
    {
        $data = Post::whereJsonContains('tags', $tags)->get();
        return response()->json(['data' => $data]);
    }
}
