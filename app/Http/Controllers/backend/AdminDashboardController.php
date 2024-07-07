<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStatusStoreRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Menu;
use App\Models\Order;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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
        $users = User::latest()->paginate(10);
        return view('backend.user', compact('users'));
    }

    public function userEdit($id)
    {
        $userId = Crypt::decrypt($id);
        $user = User::find($userId);
        return view('backend.user.edit', compact('user'));
    }

    public function userUpdate(UpdateUserRequest $request, $id)
    {
        $user = User::find($id);

        $validated = $request->validated();
        $user->update([
                'name' => $validated['name'],
                'email' => $validated['email'],
        ]);

        return redirect('/UserMenu')->with('success', 'User Berhasil di Update');
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
}
