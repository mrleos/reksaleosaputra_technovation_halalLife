<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user()->id;
        $order = Order::where('user_id', $user)->get();
        return view('frontend.cart', compact('order'));
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
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);
        
        $food = Menu::find($request->menu_id);
        $totalPrice = $food->price * $request->quantity;

        Order::create([
            'quantity' => $request->quantity,
            'total_price' => $totalPrice,
            'user_id' => $request->user_id,
            'menu_id' => $request->menu_id,
        ]);

        session()->flash('success', 'Pesanan Berhasil di Tambahkan!');
        return redirect('/cart');
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $cartId = Crypt::decrypt($id);
        $cart = Order::find($cartId);
        $cart->update([
            'status' => 'dibatalkan'
        ]);
        $cart->delete();
        session()->flash('success', 'Pesanan Berhasil di Hapus!');
        return redirect('/cart');
    }
}
