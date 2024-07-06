@extends('app')

@section('banner')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container text-center my-5 pt-5 pb-4">
        <h1 class="display-3 text-white mb-3 animated slideInDown">About</h1>
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
                            <p class="mb-4">Ayam Geprek Borobudur didirikan oleh seorang pengusaha yang berasal dari Yogyakarta, daerah di mana Candi Borobudur yang megah berdiri. Terinspirasi oleh kekayaan warisan budaya dan kuliner dari kampung halaman, pemilik mulai mengenalkan cita rasa autentik kepada masyarakat luas. Ayam Geprek Borobudur kini telah berkembang menjadi destinasi kuliner yang dicintai banyak orang dan menjadi salah satu kuliner andalan para mahasiswa. Saat ini, Ayam Geprek Borobudur terletak di Kota Kendari, tepatnya di Jl. HEA Mokodompit, Kambu, Kec. Kambu, Kota Kendari, Sulawesi Tenggara 93561.</p>
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
                        </div>
                    </div>
                </div>
            </div>
            <!-- About End -->
@endsection