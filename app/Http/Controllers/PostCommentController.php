<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Request $request, Post $post)
    {
        $request->validate([
            'message' => 'required|string',
        ]);

        PostComment::create([
            'message' => $request->message,
            'post_id' => $post->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()->back()->with('success', 'Komentar Ditambahkan!');
    }
}
