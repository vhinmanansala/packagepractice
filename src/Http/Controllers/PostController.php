<?php

namespace AlvinManansala\PackagePractice\Http\Controllers;

use AlvinManansala\PackagePractice\Http\Controllers\Controller;

class PostController extends Controller
{
    public function index()
    {

    }

    public function show()
    {

    }

    public function store()
    {
        if (! auth()->check()) {
            abort(403, 'Only authenticated users can create new posts.');
        }

        request()->validate([
            'title' => 'required',
            'body' => 'required'
        ]);

        $author = auth()->user();

        $post = $author->posts()->create([
            'title' => request('title'),
            'body' => request('body')
        ]);

        return redirect()->route('posts.show', $post);
    }
}