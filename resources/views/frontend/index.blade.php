@extends('app')

@section('banner')
{{-- spinner image banner --}}
<div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
{{-- end spinner image --}}

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-6 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">Harga Kaki Lima, Rasa Bintang Lima</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Ayam Geprek Borobudur menyajikan rasa yang lezat dan autentik. Terinspirasi oleh kekayaan warisan kuliner Indonesia dan keagungan keindahan Borobudur, menawarkan perpaduan rasa yang unik dan menggoda selera Anda.</p>
                <a href="{{ route('menu.index') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Lihat Menu</a>
            </div>
            <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="img-fluid" src="{{ asset('images/hero.png') }}" alt="">
            </div>
        </div>
    </div>
</div>
@endsection

@section('content')
            <!-- Service Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-4">
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                            <div class="service-item rounded pt-3 bg">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-user-tie text-primary mb-4"></i>
                                    <h5>Kualitas</h5>
                                    <p>Menu yang kami sajikan selalu dibuat dari bahan-bahan segar dan berkualitas, memastikan setiap hidangan selalu enak dan memuaskan para pelanggan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="service-item rounded pt-3 bg">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-utensils text-primary mb-4"></i>
                                    <h5>Pelayanan</h5>
                                    <p>Nikmati pelayanan cepat dan ramah dari tim kami. Kami selalu siap melayani Anda dengan sepenuh hati.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="service-item rounded pt-3 bg">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-cart-plus text-primary mb-4"></i>
                                    <h5>Harga Terjangkau</h5>
                                    <p>Nikmati ayam geprek lezat dengan harga yang ramah di kantong. Kualitas premium tanpa menguras kantong.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="service-item rounded pt-3 bg">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                    <h5>Promosi</h5>
                                    <p>Jangan lewatkan promo spesial dan diskon menarik dari kami di tiap minggunya!</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Service End -->
        
            <!-- About Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="row g-5 align-items-center">
                        <div class="col-lg-6">
                            <div class="row g-3">
                                <div class="col-6 text-start">
                                    <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('images/about-1.png') }}">
                                </div>
                                <div class="col-6 text-start">
                                    <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('images/about-2.png') }}" style="margin-top: 25%;">
                                </div>
                                <div class="col-6 text-end">
                                    <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('images/about-3.png') }}">
                                </div>
                                <div class="col-6 text-end">
                                    <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('images/about-4.png') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Tentang Kami</h5>
                            <h1 class="mb-4">Welcome to <i class="fa fa-utensils text-primary me-2"></i>Restoran</h1>
                            <p class="mb-4">Ayam Geprek Borobudur menyajikan rasa yang lezat dan autentik. Terinspirasi oleh kekayaan warisan kuliner Indonesia dan keagungan keindahan Borobudur, menawarkan perpaduan rasa yang unik dan menggoda selera Anda.</p>
                            <div class="row g-4 mb-4">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center px-3">
                                        <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">2019</h1>
                                        <div class="ps-1">
                                            <p class="mb-0">Tahun</p>
                                            <h6 class="text-uppercase mb-0">Berdiri</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center px-3">
                                        <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">09.00</h1>
                                        <div class="ps-8">
                                            <p class="mb-0">Jam Buka</p>
                                            <h6 class="text-uppercase mb-0">09.00-22.00 | Senin-Sabtu</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="height: 3px;">
                            <a class="btn btn-primary py-3 px-5 mt-2" href="{{ route('about.index') }}">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->
        
            <!-- Menu Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                        <h5 class="section-title ff-secondary text-center text-primary fw-normal">Borobudur Menu</h5>
                        <h1 class="mb-5">Most Popular Items</h1>
                    </div>
                    <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                    <i class="fa fa-utensils fa-2x text-primary"></i>
                                    <div class="ps-3">
                                        <small class="text-body">Menu</small>
                                        <h6 class="mt-n1 mb-0">Makanan</h6>
                                    </div>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                    <i class="fa fa-coffee fa-2x text-primary"></i>
                                    <div class="ps-3">
                                        <small class="text-body">Menu</small>
                                        <h6 class="mt-n1 mb-0">Minuman</h6>
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- Menu End -->
@endsection