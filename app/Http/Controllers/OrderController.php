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
        $title = 'Cart';
        $user = Auth::user()->id;
        $order = Order::where('user_id', $user)->get();
        return view('frontend.cart', compact('order', 'title'));
    }

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

        return redirect('/cart')->with('success', 'Pesanan Berhasil di Tambahkan!');
    }

    public function destroy($id)
    {
        $cartId = Crypt::decrypt($id);
        $cart = Order::find($cartId);
        $cart->update([
            'status' => 'dibatalkan'
        ]);
        $cart->delete();
        return redirect('/cart')->with('success', 'Pesanan Berhasil di Hapus!');
    }
}
