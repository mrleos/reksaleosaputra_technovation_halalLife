@extends('app')

@section('banner')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Detail</h1>
    </div>
</div>
@endsection

@section('content')
    <div class="row justify-content-center">
        <div class="card" style="width: 30rem;">
            <img src="{{ asset('storage/'.$detail->image) }}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title text-center">{{ $detail->title }}</h5>
                <hr>
                <div class="text-end">
                    <span class="text-primary fw-bold fs-5"><s class="text-secondary px-2 fs-6">Rp.{{ $detail->price+3000 }}</s> Rp.{{ $detail->price }}</span>
                </div>
                <hr>
                <span><p class="fw-bold">Deskripsi Produk</p></span>
                <p class="card-text text-justify">{{ $detail->description }}</p>
                <hr>
                <div class="text-end mb-2">
                <a href="{{ route('comment', Crypt::encrypt($detail->id)) }}">Ulasan Terkait Produk <i class="fa-solid fa-arrow-right"></i></a></div>
            </div>
            <form action="{{ route('cart.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="input-group mb-3">
                <span class="input-group-text bg-primary text-light mx-2" id="basic-addon1">Jumlah Pesanan : </span>
                <input type="number" class="form-control" placeholder="0" name="quantity" required min="1">
                <input type="hidden" name="menu_id" value="{{ $detail->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::user()->id ?? '' }}">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Masukkan Keranjang</button>
            </form>
        </div>
    </div>
@endsection