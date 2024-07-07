@extends('app')

@section('banner')
<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">Shop</h1>
    </div>
</div>
@endsection

@section('content')
            <!-- Menu Start -->
            {{-- Food --}}
            <div class="container">
                <form class="d-flex" role="search" method="POST" action="{{ route('search') }}">
                @csrf
                  <input class="form-control me-2 rounded-pill" type="search" placeholder="Search" aria-label="Search" name="search">
                  <button class="btn btn-outline-primary rounded-pill" type="submit">Search</button>
                </form>
            </div>
            <hr>

            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="section-title ff-secondary text-center text-primary fw-normal">Produk</h5>
                        <h1 class="mb-5">Produk Populer</h1>
                    </div>
                    <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                            <li class="nav-item mb-1">
                                <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                    <i class="fa fa-grip fa-2x text-primary"></i>
                                    <div class="ps-3">
                                        <h6 class="mt-n1 mb-0">Semua</h6>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item mb-1">
                                <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3" data-bs-toggle="pill" href="#tab-2">
                                    <i class="fa fa-utensils fa-2x text-primary"></i>
                                    <div class="ps-3">
                                        <h6 class="mt-n1 mb-0">Makanan</h6>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                    <i class="fa fa-pump-medical fa-2x text-primary"></i>
                                    <div class="ps-3">
                                        <h6 class="mt-n1 mb-0">Kosmetik</h6>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-4">
                                    <i class="fa fa-shirt fa-2x text-primary"></i>
                                    <div class="ps-3">
                                        <h6 class="mt-n1 mb-0">Pakaian</h6>
                                    </div>
                                </a>
                            </li>
                        </ul>
                        <div class="tab-content">
                            <div id="tab-1" class="tab-pane fade show p-0 active">
                                <div class="row g-4">
                                    @forelse ($food as $item)
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/'.$item->image) }}" alt="" style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>{{ $item->title }}</span>
                                                    <span class="text-primary">Rp. {{ $item->price }}</span>
                                                </h5>
                                                <small class="fst-italic">{{ $item->description }}</small>
                                            </div>
                                        </div>
                                        <div class="text-start">
                                            <a href="{{ route('detail', Crypt::encrypt($item->id)) }}" class="btn btn-primary">Lihat Detail <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    {{ $food->links() }}
                                    @empty
                                    <div class="alert alert-danger rounded" role="alert">
                                        Menu Tidak Tersedia!
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane fade show p-0 active">
                                <div class="row g-4">
                                    @forelse ($food as $item)
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/'.$item->image) }}" alt="" style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>{{ $item->title }}</span>
                                                    <span class="text-primary">Rp. {{ $item->price }}</span>
                                                </h5>
                                                <small class="fst-italic">{{ $item->description }}</small>
                                            </div>
                                        </div>
                                        <div class="text-start">
                                            <a href="{{ route('detail', Crypt::encrypt($item->id)) }}" class="btn btn-primary">Lihat Detail <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    {{ $food->links() }}
                                    @empty
                                    <div class="alert alert-danger rounded" role="alert">
                                        Menu Tidak Tersedia!
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <div id="tab-3" class="tab-pane fade show p-0">
                                <div class="row g-4">
                                    @forelse ($drink as $item)
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/'.$item->image) }}" alt="" style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>{{ $item->title }}</span>
                                                    <span class="text-primary">Rp. {{ $item->price }}</span>
                                                </h5>
                                                <small class="fst-italic">{{ $item->description }}</small>
                                            </div>
                                        </div>
                                        <div class="text-start">
                                            <a href="{{ route('detail', Crypt::encrypt($item->id)) }}" class="btn btn-primary">Lihat Detail <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    {{ $drink->links() }}
                                    @empty
                                    <div class="alert alert-danger rounded" role="alert">
                                        Menu Tidak Tersedia!
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                            <div id="tab-4" class="tab-pane fade show p-0">
                                <div class="row g-4">
                                    @forelse ($drink as $item)
                                    <div class="col-lg-6">
                                        <div class="d-flex align-items-center">
                                            <img class="flex-shrink-0 img-fluid rounded" src="{{ asset('storage/'.$item->image) }}" alt="" style="width: 80px;">
                                            <div class="w-100 d-flex flex-column text-start ps-4">
                                                <h5 class="d-flex justify-content-between border-bottom pb-2">
                                                    <span>{{ $item->title }}</span>
                                                    <span class="text-primary">Rp. {{ $item->price }}</span>
                                                </h5>
                                                <small class="fst-italic">{{ $item->description }}</small>
                                            </div>
                                        </div>
                                        <div class="text-start">
                                            <a href="{{ route('detail', Crypt::encrypt($item->id)) }}" class="btn btn-primary">Lihat Detail <i class="fa-solid fa-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    {{ $drink->links() }}
                                    @empty
                                    <div class="alert alert-danger rounded" role="alert">
                                        Menu Tidak Tersedia!
                                    </div>
                                    @endforelse
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu End -->
@endsection