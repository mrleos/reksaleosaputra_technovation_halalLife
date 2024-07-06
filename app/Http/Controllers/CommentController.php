<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $menuId = Crypt::decrypt($id);
        $menu = Menu::find($menuId);
        $comment = Comment::where('menu_id', $menuId)->get();
        return view('frontend.comment', compact('menu', 'comment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentStoreRequest $request)
    {
        $validated = $request->validated();
        Comment::create([
            'message' => $validated['message'],
            'user_id' => $request['user_id'],
            'menu_id' => $request['menu_id'],
            'rating' => $request['rating']
        ]);

        return redirect()->back()->with('success', 'Ulasan Berhasil di Tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        //
    }
}
