@extends('layouts.landing.main')
@section('content-landing')
    <section class="hero-wrap" style="background-image: url('images/bg_1.jpg');" data-stellar-background-ratio="0.3">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center">
                <div class="col-md-10 col-lg-7 ftco-animate d-flex align-items-end">
                    <div class="text">
                        <h1 class="mb-4">Artikel Petani</h1>
                        <p style="font-size: 18px;"></p>
                        <div class="d-flex meta">
                            <a href="#" class="d-flex align-items-center button-link">
                                <div class="button-video d-flex align-items-center justify-content-center">
                                    <span class="fa fa-play"></span>
                                </div>
                                <span>Tonton Video Kami</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="hero-wrap hero-wrap-2" style="background-image: url('{{ asset('landing/images/detAr1.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end">
                <div class="col-md-9 ftco-animate pb-5">
                    <h1 class="mb-3 bread" style="color: white"> Artikel </h1>
                </div>
            </div>
    </section> --}}
    <section class="ftco-section ftco-portfolio">
        <div class="row justify-content-center no-gutters">
            <div class="col-md-12 heading-section text-center ftco-animate mb-5">
                <span class="subheading">Judul</span>
                <h2 class="mb-2">{{ $artikel->judul }}</h2>
            </div>
        </div>
    </section>
    <section id="about" class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 order-md-last d-md-flex align-items-stretch">
                    <div class="img w-100 img-2 mr-md-2"><img src="{{ url('files/artikel/') }}/{{ $artikel->foto }}"
                            style="width:110% ;" alt=""></div>
                </div>
                <!-- style="background-image: url(images/.jpg);" -->
                <div class="col-lg-5 wrap-about py-md-5 ftco-animate">
                    <div class="heading-section pr-md-5">
                        <p>{{ $artikel->deskripsi }}</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- <section class="ftco-section ftco-portfolio">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12 portfolio-wrap">
                    <div class="row no-gutters align-items-center">

                        <img src="{{ url('files/artikel/') }}/{{ $artikel->foto }}" alt="">

                        <div class="col-md-7">
                            <div class="text pt-5 pl-0 pl-lg-5 pl-md-4 ftco-animate">
                                <div class="px-4 px-lg-4">
                                    <div class="desc">
                                        <div class="top">
                                            <span class="subheading">Exterior {12/07/2020}</span>
                                            <h2 class="mb-4"><a href="work.html">Geometric Building</a></h2>
                                        </div>
                                        <div class="absolute">
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia
                                                and
                                                Consonantia, there live the blind texts. Separated they live in
                                                Bookmarksgrove.</p>
                                            <p><a href="#" class="custom-btn">View Portfolio</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 portfolio-wrap">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-12">
                            <div class="text pt-5 pr-md-5 ftco-animate">
                                <div class="px-4 px-lg-4">
                                    <div class="desc text-md-right">
                                        <div class="absolute">
                                            <p>Far far away, behind the word mountains, far from the countries Vokalia
                                                and
                                                Consonantia, there live the blind texts. Separated they live in
                                                Bookmarksgrove.</p>
                                            <p><a href="#" class="custom-btn">View Portfolio</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
