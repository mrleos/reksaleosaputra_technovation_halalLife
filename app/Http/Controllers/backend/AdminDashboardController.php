<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStatusStoreRequest;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menu = Menu::latest()->paginate(10);
        return view('backend.index', compact('menu'));
    }

    public function userMenu()
    {
        $users = User::all();
        if (Gate::allows('user-manage')) {
            return view('backend.user', compact('users'));
        } else {
            return redirect()->back()->with('error', 'Anda bukan Admin');
        }
    }

    public function userDestroy($id)
    {
        $userId = Crypt::decrypt($id);
        $user = User::find($userId);
        $user->delete();
        return redirect('/UserMenu')->with('success', 'User Berhasil Dihapus');
    }

    public function userOrder()
    {
        $order = Order::withTrashed()->where('status', '!=', 'dibatalkan')->latest()->paginate(10);
        return view('backend.order', compact('order'));
    }

    public function orderStatus(OrderStatusStoreRequest $request, $id)
    {
        $idOrder = Crypt::decrypt($id);
        $order = Order::withTrashed()->find($idOrder);

        $validated = $request->validated();

        $order->update([
            'order_status' => $validated['order_status']
    ]);

        return redirect('/UserOrder')->with('success', 'Status Pesanan Berhasil di Ubah!');
    }

    public function userPost()
    {
        $post = Post::where('status', 'pending')->latest()->paginate(10);
        return view('backend.post', compact('post'));
    }

    public function postStatus(Request $request, $id)
    {
        $idPost = Crypt::decrypt($id);
        $post = Post::find($idPost);

        $validated = $request->validate([
            'status' => 'required|string',
        ]);

        $post->update([
            'status' => $validated['status']
    ]);

        return redirect('/UserPost')->with('success', 'Status Postingan Berhasil di Ubah!');
    }

    public function addUser(StoreUserRequest $request)
    {
        $validated = $request->validated();

        User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'role_id' => $validated['role_id']
        ]);

        return redirect()->back()->with('success', 'Pengguna Berhasil di Tambahkan!');
    }
}
