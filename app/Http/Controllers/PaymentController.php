<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Midtrans\Config;
use Midtrans\Snap;

class PaymentController extends Controller
{
    public function __construct()
    {
        // Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.server_key');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.is_production');
        // Set sanitization on (default)
        Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        Config::$is3ds = true;
    }

    public function showPayment($id)
    {
        $title = 'Pembayaran';
        $menuId = Crypt::decrypt($id);
        $order = Order::find($menuId);
        return view('frontend.payment.form', compact('order', 'title'));
    }

    public function processPayment(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1000', // Minimum amount in IDR
            'payment_method' => 'required|in:bank_transfer,cash',
        ]);

        $params = [
            'transaction_details' => [
                'order_id' => uniqid(),
                'gross_amount' => $request->amount,
            ],
            'customer_details' => [
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ],
            'enabled_payments' => [$request->payment_method],
        ];

        if ($request->payment_method === 'bank_transfer') {
            $params['bank_transfer'] = [
                'bank' => 'gopay', // Change to the bank you want to support
            ];
        } 

        try {
            $order = Order::find($request->id);
            if ($request->payment_method === 'cash') {
                // Handle cash payment;
                $order->update([
                    'status' => 'via cash'
                ]);
                $order->delete();
                return view('frontend.payment.success')->with('success', 'Silahkan Bayar Cash!');
            } else {
                // Handle QRIS and bank transfer
                $snapToken = Snap::getSnapToken($params);
                $order->update([
                    'status' => 'via transfer'
                ]);
                $order->delete();
                $title = 'Pembayaran';
                return view('frontend.payment.process', compact('snapToken', 'request', 'title'));
            }
        } catch (\Exception $e) {
            return back()->withErrors('Error! ' . $e->getMessage());
        }
    }

    public function paymentSuccess()
    {
        $title = 'Pembayaran';
        return view('frontend.payment.success', 'title')->with('success', 'Silahkan Ambil Pesanan Anda!');
    }

}
