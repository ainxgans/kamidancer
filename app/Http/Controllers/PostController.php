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

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $data = Post::find($id);
        return response()->json(['data' => $data]);
    }
    public function postByTags($tags)
    {
        $data = Post::whereJsonContains('tags', $tags)->get();
        return response()->json(['data' => $data]);
    }
    public function search(Request $request)
    {
        $term = $request->query('search');
        $data = Post::where("title", "LIKE", "%" . $term . "%")->get();
        return response()->json(['data' => $data]);
    }
}
