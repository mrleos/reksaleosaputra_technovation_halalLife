@extends('app')

@section('banner')

<div class="container-xxl py-5 bg-dark hero-header mb-5">
    <div class="container my-5 py-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-10 text-center text-lg-start">
                <h1 class="display-3 text-white animated slideInLeft">Selamat Datang di Website Halal Life</h1>
                <p class="text-white animated slideInLeft mb-4 pb-2">Destinasi utama Anda untuk inspirasi gaya hidup Islami, belanja halal berkualitas, dan diskusi komunitas yang bermanfaat. Temukan artikel inspiratif, tips praktis, produk halal terbaik, dan bergabunglah dengan forum kami untuk berbagi dan belajar bersama sesama.</p>
                <a href="{{ route('menu.index') }}" class="btn btn-primary py-sm-3 px-sm-5 me-3 animated slideInLeft">Lihat Produk</a>
            </div>
            {{-- <div class="col-lg-6 text-center text-lg-end overflow-hidden">
                <img class="img-fluid" src="{{ asset('images/hero.png') }}" alt="">
            </div> --}}
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
                                    <h5>Inspirasi Gaya Hidup Islami</h5>
                                    <p>Menyediakan artikel-artikel inspiratif, panduan, dan tips praktis untuk menjalani gaya hidup Islami yang seimbang dan bermanfaat..</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.3s">
                            <div class="service-item rounded pt-3 bg">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-tag text-primary mb-4"></i>
                                    <h5>Belanja Produk Halal</h5>
                                    <p>Menawarkan berbagai produk berkualitas tinggi yang sesuai dengan prinsip-prinsip halal, termasuk pakaian, makanan, dan produk kecantikan.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.5s">
                            <div class="service-item rounded pt-3 bg">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-users text-primary mb-4"></i>
                                    <h5>Diskusi Komunitas</h5>
                                    <p>Forum komunitas untuk berbagi pengalaman, ide, dan pandangan tentang berbagai topik terkait kehidupan Islami, memungkinkan anggota untuk saling mendukung dan memperluas pengetahuan mereka.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.7s">
                            <div class="service-item rounded pt-3 bg">
                                <div class="p-4">
                                    <i class="fa fa-3x fa-headset text-primary mb-4"></i>
                                    <h5>Konsultasi dan Edukasi</h5>
                                    <p>Layanan konsultasi pribadi dan program edukasi untuk membantu memperdalam pemahaman tentang nilai-nilai Islami, dari aspek spiritual hingga praktis dalam kehidupan sehari-hari.</p>
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
                                    <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.1s" src="{{ asset('images/about-3.jpg') }}">
                                </div>
                                <div class="col-6 text-start">
                                    <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.3s" src="{{ asset('images/about-2.jpg') }}" style="margin-top: 25%;">
                                </div>
                                <div class="col-6 text-end">
                                    <img class="img-fluid rounded w-75 wow zoomIn" data-wow-delay="0.5s" src="{{ asset('images/about-1.jpg') }}">
                                </div>
                                <div class="col-6 text-end">
                                    <img class="img-fluid rounded w-100 wow zoomIn" data-wow-delay="0.7s" src="{{ asset('images/about-4.jpg') }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <h5 class="section-title ff-secondary text-start text-primary fw-normal">Tentang Kami</h5>
                            <h1 class="mb-4">Tentang <img src="{{ asset('images/logo.png') }}" alt="Logo" width="90px">Website</h1>
                            <p class="mb-4">Halal Life merupakan tempat di mana kami menginspirasi dan mendukung gaya hidup Islami yang seimbang dan bermakna. Kami berkomitmen untuk menyediakan konten bermanfaat yang mencakup artikel inspiratif, tips praktis, dan panduan terkait kehidupan sehari-hari sesuai dengan nilai-nilai Islam. Di sini, Anda juga dapat menemukan berbagai produk halal berkualitas tinggi untuk memenuhi kebutuhan sehari-hari Anda dengan keyakinan.</p>
                            <p class="mb-4">Kami tidak hanya sekadar sebuah platform, tetapi komunitas yang berusaha untuk saling mendukung dan menguatkan. Dengan fokus pada pendekatan yang modern dan inklusif, kami mengundang Anda untuk bergabung dalam diskusi, berbagi pengalaman, dan memperluas pengetahuan tentang kehidupan Islami. Tujuan kami sederhana: memberikan inspirasi yang relevan dan solusi praktis agar setiap individu dapat meraih kesuksesan dan kebahagiaan dalam bingkai nilai-nilai yang diberkati.</p>
                            <div class="row g-4 mb-4">
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center px-3">
                                        <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $totalVisit }}</h1>
                                        <div class="ps-1">
                                            <h6 class="text-uppercase mb-0">Total Pengunjung</h6>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="d-flex align-items-center px-3">
                                        <h1 class="flex-shrink-0 display-5 text-primary mb-0" data-toggle="counter-up">{{ $user }}</h1>
                                        <div class="ps-8">
                                            <h6 class="text-uppercase mb-0">Total Pengguna</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr style="height: 3px;">
                            <a class="btn btn-primary py-3 px-5 mt-2" href="{{ route('about.index') }}">Visit Forum</a>
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