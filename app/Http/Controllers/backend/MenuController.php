<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMenuRequest;
use App\Models\Menu;
use Illuminate\Support\Facades\Crypt;

class MenuController extends Controller
{
    public function store(StoreMenuRequest $request)
    {
        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu_images', 'public');
            $validated['image'] = $imagePath;
        }

        $menu = Menu::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'price' => $validated['price'],
            'description' => $validated['description'],
            'image' => $validated['image'] ?? null,
        ]);

        return redirect('/AdminDashboard')->with('success', 'Menu Berhasil Ditambahkan!');
    }

    public function destroy($id)
    {
        $menuId = Crypt::decrypt($id);
        $menu = Menu::find($menuId);
        $menu->delete();
        return redirect('/AdminDashboard')->with('success', 'Menu Berhasil Dihapus');
    }

    public function edit($id)
    {
        $menuId = Crypt::decrypt($id);
        $menu = Menu::find($menuId);
        return view('backend.menu.edit', compact('menu'));
    }

    public function update(StoreMenuRequest $request, $id)
    {
        $menuId = Crypt::decrypt($id);
        $menu = Menu::find($menuId);

        $validated = $request->validated();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('menu_images', 'public');
            $validated['image'] = $imagePath;

            $menu->update([
                'title' => $validated['title'],
                'category' => $validated['category'],
                'price' => $validated['price'],
                'description' => $validated['description'],
                'image' => $validated['image'],
            ]);
        } else {
            $menu->update([
                'title' => $validated['title'],
                'category' => $validated['category'],
                'price' => $validated['price'],
                'description' => $validated['description'],
            ]);
        }


        return redirect('/AdminDashboard')->with('success', 'Menu Berhasil di Update!');
    }
}
