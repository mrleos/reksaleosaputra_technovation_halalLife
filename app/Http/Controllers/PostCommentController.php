<?php

namespace App\Http\Controllers;

use App\Models\PostComment;
use Illuminate\Http\Request;

class PostCommentController extends Controller
{
    public function store(Request $request)
    {
        dd($request);
        $validated = $request->validate([
            'message' => 'required|string',
            'user_id' => 'required|integer',
        ]);

        PostComment::create([
            'message' => $validated['message'],
            'user_id' => $validated['user_id'],
        ]);

        return redirect()->back()->with('success', 'Komentar Ditambahkan!');
    }

    public function storeIdPost(Request $request)
    {
        $validated = $request->validate([
            'post_id' => 'required|integer',
        ]);

        PostComment::update([
            'post_id' => $validated['post_id'],
        ]);
    }
}
