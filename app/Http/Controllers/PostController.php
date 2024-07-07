<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function store(StorePostRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu_images', 'public');
            $validated['image'] = $imagePath;
        }

        Post::create([
            'description' => $validated['description'],
            'image' => $validated['image'] ?? null,
            'user_id' => $validated['user_id'],
            'status' => 'pending',
        ]);

        return redirect('/about')->with('success', 'Postingan Sedang ditijau oleh admin / operator!');
    }

}
