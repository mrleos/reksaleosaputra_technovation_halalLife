<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentStoreRequest;
use App\Models\Comment;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

class CommentController extends Controller
{
    public function index($id)
    {
        $menuId = Crypt::decrypt($id);
        $menu = Menu::find($menuId);
        $comment = Comment::where('menu_id', $menuId)->get();
        return view('frontend.comment', compact('menu', 'comment'));
    }

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

}
