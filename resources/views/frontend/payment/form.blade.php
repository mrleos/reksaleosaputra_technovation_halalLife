@extends('app')

@section('banner')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Pembayaran</h1>
    </div>
</div>
@endsection

@section('content')
<div class="container">
    <h1>Form Pembayaran</h1>
    @if($errors->any())
        <div class="alert alert-danger">{{ $errors->first() }}</div>
    @endif
    @if(session('status'))
        <div class="alert alert-success">{{ session('status') }}</div>
    @endif
    <form action="{{ route('processPayment') }}" method="POST" id="payment-form">
        @csrf
        @method('POST')
        <div class="form-group pb-2">
            <label for="amount">Total (IDR)</label>
            <input type="number" name="amount" id="amount" class="form-control" min="{{ $order->total_price }}" value="{{ $order->total_price }}">
        </div>
        <div class="form-group pb-2">
            <label for="payment_method">Metode Pembayaran</label>
            <select name="payment_method" id="payment_method" class="form-control" required>
                <option value="bank_transfer">Bank Transfer</option>
                <option value="cash">Cash</option>
            </select>
            <input type="hidden" name="id" id="id" class="form-control" value="{{ $order->id }}">
        </div>
        <button type="submit" class="btn btn-primary">Bayar Sekarang</button>
    </form>
</div>
@endsection