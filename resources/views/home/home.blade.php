@extends('layouts.tema')

@section('title', 'Surveynesia')

@section('tema')
  <section class="slice py-5">
        <div class="container">
            <div class="row row-grid align-items-center">
                <div class="col-12 col-md-5 col-lg-6 order-md-2">
                    <!-- Image -->
                    <figure class="w-100">
                        <img alt="Image placeholder" src="{{asset('tema/assets/img/svg/illustrations/background.png')}}" class="img-fluid mw-md-120">
                    </figure>
                </div>
                <div class="col-12 col-md-7 col-lg-6 order-md-1 pr-md-5">
                    <!-- Heading -->
                    <h1 class="display-4 text-center text-md-left mb-3">
                        Mempermudah anda melakukan  <strong class="text-primary">Pengumpulan Data</strong>
                    </h1>
                    <!-- Text -->
                    <p class="lead text-center text-md-left text-muted">
                         Menyediakan berbagai surveyor profesional di berbagai kota untuk menyelesaikan survey anda
                    </p>
                    <!-- Buttons -->
                    <div class="text-center text-md-left mt-5">
                        <a href="{{route('user')}}" class="btn btn-primary btn-icon">
                            <span class="btn-inner--text">Buat Survey</span><span class="btn-inner--icon">
                                <i data-feather="arrow-right"></i>
                            </span>
                        </a>
                    
                        
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="slice slice-lg pt-lg-6 pb-0 pb-lg-6" id="tentang">
        <div class="container">
            <!-- Title -->
            <!-- Section title -->
            <div class="row mb-5 justify-content-center text-center">
                <div class="col-lg-6">
                  

                    <h2 class=" mt-4">Apa Itu Surveynesia?</h2>
                    <div class="mt-2">
                        <p class="lead lh-180">Surveynesia merupakan platform yang membantu anda dalam melakukan survei atau pengumpulan data secara online dan offline (lapangan). Pantau pelaksanaan survey dimanapun dengan mudah</p>
                    </div>
                </div>
            </div>
            <!-- Card -->
            <div class="row mt-5">
                <div class="col-md-4">
                    <div class="card border-0 bg-soft-danger">
                        <div class="card-body pb-5">
                            <div class="pt-4 pb-5">
                                <img src="{{asset('tema/assets/img/svg/illustrations/gambar1.png')}}" class="img-fluid img-center" style="height: 200px;" alt="Illustration" />
                            </div>
                            <h5 class="h4 lh-130 text-dark mb-3">Pilih Tenggang Waktu Survey Anda</h5>
                            <p class="text-dark opacity-6 mb-0">Kami dapat menjalankan tugas pengumpulan data sesuai waktu yang anda tentukan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 bg-soft-success">
                        <div class="card-body pb-5">
                            <div class="pt-4 pb-5">
                                <img src="{{asset('tema/assets/img/svg/illustrations/illustration-6.svg')}}" class="img-fluid img-center" style="height: 200px;" alt="Illustration" />
                            </div>
                            <h5 class="h4 lh-130 text-dark mb-3">Pilih Target Survey Anda</h5>
                            <p class="text-dark opacity-6 mb-0">Kami menyediakan target survey yang anda inginkan berdasarkan perkerjaan.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card border-0 bg-soft-warning">
                        <div class="card-body pb-5">
                            <div class="pt-4 pb-5">
                                <img src="{{asset('tema/assets/img/svg/illustrations/gambar2.png')}}" class="img-fluid img-center" style="height: 200px;" alt="Illustration" />
                            </div>
                            <h5 class="h4 lh-130 text-dark mb-3">Terdapat Laporan Harian</h5>
                            <p class="text-dark opacity-6 mb-0">Tidak Perlu ragu anda akan mendapatkan laporan harian survey anda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="slice slice-lg" id="layanan">
        <div class="container">
            <div class="row row-grid justify-content-around align-items-center">
                <div class="col-lg-6 order-lg-2 ml-lg-auto pl-lg-6">
                    <!-- Heading -->
                    <h5 class="h2 mt-4">Mengapa Menggunakan Surveynesia?</h5>
                    <!-- Text -->
                    <p class="lead lh-190 my-4">
                        Kami menyediakan bermacam jenis survey tidak terbatas pada survey online saja, kami juga terdapat pemilihan target surveyor dan pemilihan rentang waktu pengerjaan. Surveyor kami merupakan surveyor berpengalaman. 
                    </p>
                    <!-- List -->
                    <ul class="list-unstyled">
                        <li class="py-2">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="icon icon-shape icon-primary icon-sm rounded-circle mr-3">
                                        <i class="fas fa-globe-asia"></i>
                                    </div>
                                </div>
                                <div>
                                    <span class="h6 mb-0">Surveyor Tersebar di Kota Kota di Indonesia</span>
                                </div>
                            </div>
                        </li>
                        <li class="py-2">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="icon icon-shape icon-warning icon-sm rounded-circle mr-3">
                                       <i class="fas fa-money-bill-wave-alt"></i>
                                    </div>
                                </div>
                                <div>
                                    <span class="h6 mb-0">Garansi Cashback</span>
                                </div>
                            </div>
                        </li>
                        <li class="py-2">
                            <div class="d-flex align-items-center">
                                <div>
                                    <div class="icon icon-shape icon-success icon-sm rounded-circle mr-3">
                                      <i class="fas fa-clipboard"></i>  
                                    </div>
                                </div>
                                <div>
                                    <span class="h6 mb-0">Bisa Pantau Progress Setiap Saat</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-6 order-lg-1">
                    <!-- Image -->
                    <div class="position-relative zindex-100">
                        <img alt="Image placeholder" src="{{asset('tema/assets/img/svg/illustrations/illustration-2.svg')}}" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
 
    @endsection