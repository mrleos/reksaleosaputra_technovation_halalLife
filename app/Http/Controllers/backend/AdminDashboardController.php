<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrderStatusStoreRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Menu;
use App\Models\Order;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
}
