@extends('app')

@section('banner')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Keranjang</h1>
    </div>
</div>
@endsection

@section('content')
@forelse ($order as $item)
<div class="row justify-content-center m-2">
    <div class="card" style="width: 20rem;">
        <img src="{{ asset('storage/'.$item->menu->image) }}" class="card-img-top" alt="...">
        <div class="card-body">
            <h5 class="card-title text-center">{{ $item->menu->title }} (x {{ $item->quantity }})</h5>
            <hr>
            <div class="clearfix">
                <span class="float-start fw-bold">Total Harga</span>
                <span class="float-end text-primary fw-bold fs-5">Rp.{{ $item->total_price }}</span>
            </div>
            <hr>
            <span><p class="fw-bold">Deskripsi Produk</p></span>
            <p class="card-text text-justify">{{ $item->menu->description }}</p>
            <hr>
            <div class="text-end mb-2">
            <a href="{{ route('comment', Crypt::encrypt($item->menu->id)) }}">Ulasan Terkait Produk <i class="fa-solid fa-arrow-right"></i></a></div>
        </div>
        <a href="{{ route('payment.show',Crypt::encrypt($item->id)) }}" class="btn btn-primary mb-2">Bayar Sekarang</a>
        <a href="{{ route('cart.destroy', Crypt::encrypt($item->id)) }}" class="btn btn-primary bg-light text-primary mb-2">Batalkan</a>
    </div>
</div>
@empty
<div class="alert alert-danger rounded" role="alert">
    Pesanan Tidak Tersedia!
</div>    
@endforelse

@endsection