@extends('layouts.landing.main')
@section('content-landing')
    <section class="hero-wrap" style="background-color: azure;" data-stellar-background-ratio="0.3">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text align-items-center">
                <div class="row gx-5 ftco-animate d-flex align-items-center">
                    <div class="col-lg-6">
                        <div class="mb-5 text-lg-start">
                            <div class="text">
                                <h1 class="mb-4">Masalah Pertanian <span>Dapat Teratasi dengan GoFarm</span>
                                </h1>
                                <p style="font-size: 18px;">Aplikasi website untuk menangani permasalahan di bidang
                                    pertanian <span>secara cepat dan mudah</span> </p>
                                <div class="d-flex meta">
                                    <div class="">
                                        <p class="mb-0"><a href="#" style="border-radius: 500px;"
                                                class="btn btn-primary py-3 px-2 px-md-4">Mulai Jelajah</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div><img style="height: 500px; margin-left: 100px;"
                                src="{{ asset('landing/images/gambar1.png') }}" alt=""></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-no-pb ftco-no-pt bg-primary">
        <div class="container">
            <div class="row d-flex justify-content-center  no-gutters">
                <div class="col-md-3 d-flex align-items-stretch ftco-animate">
                    <div class="media block-6 services services-bg d-block text-center px-4 py-5">
                        <div class="icon d-flex justify-content-center align-items-center"><img
                                src="{{ asset('landing/images/artikel.png') }}" alt=""></div>
                        <div class="media-body py-md-4">
                            <h3>Artikel</h3>
                            <p>Fitur artikel sebagai media informasi untuk menambah
                                pengetahuan masyarakat dibidang pertanian</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-items-stretch ftco-animate">
                    <div class="media block-6 services services-bg services-darken d-block text-center px-4 py-5">
                        <div class="icon d-flex justify-content-center align-items-center"><img
                                src="{{ asset('landing/images/chat.png') }}" alt=""></div>
                        <div class="media-body py-md-4">
                            <h3>Chat</h3>
                            <p>Fitur chat digunakan sebagai media konsultasi mengenai masalah yang dialami masyarakat
                                dibidang pertanian</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 d-flex align-items-stretch ftco-animate">
                    <div class="media block-6 services services-bg services-lighten d-block text-center px-4 py-5">
                        <div class="icon d-flex justify-content-center align-items-center"><img
                                src="{{ asset('landing/images/teman.png') }}" alt=""></div>
                        <div class="media-body py-md-4">
                            <h3>Relasi Petani</h3>
                            <p>Memudahkan para petani untuk saling berkomunakasi secara mudah dan cepat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" class="ftco-section ftco-no-pb ftco-no-pt">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 order-md-last d-md-flex align-items-stretch">
                    <div class="img w-100 img-2 mr-md-2"><img src="{{ asset('landing/images/mokup.png') }}"
                            style="width:110% ;" alt=""></div>
                </div>
                <!-- style="background-image: url(images/.jpg);" -->
                <div class="col-lg-5 wrap-about py-md-5 ftco-animate">
                    <div class="heading-section pr-md-5">
                        <h2 class="mb-4">GoFarm</h2>

                        <p>Dunia pertanian pada zaman sekarang bergantung pada teknologi informasi
                            baik dalam bentuk apapun. Petani Indonesia membutuhkan informasi yang
                            berkaitan dengan dunia pertanian. Dengan adanya GoFarm diharapkan mampu untuk memberikan
                            solusi bagi para petani agar mudah berkomunikasi dan mengakses materi-materi tentang
                            pertanian.</p>
                        <p>
                            GoFram adalah software atau aplikasi yang memudahkan petani untuk berkomunikasi
                            atau konsultasi dengan petugas pertanian yaitu petugas POPT (Petugas Pengendali
                            Organisme Pengganggu Tumbuhan )</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section ftco-portfolio">
        <div class="container">
            <div class="row no-gutters">
                <div class="col-md-12 portfolio-wrap">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-5 img js-fullheight"
                            style="background-image: url({{ asset('landing/images/petani1.png') }});">
                        </div>
                        <div class="col-md-7">
                            <div class="text pt-5 pl-0 pl-lg-5 pl-md-4 ftco-animate">
                                <div class="px-4 px-lg-4">
                                    <div class="desc">
                                        <div class="top">
                                            <!-- <span class="subheading">Exterior {12/07/2020}</span> -->
                                            <h2 class="mb-4"><a href="work.html">Petani Indonesai <br>
                                                    Maju</a></h2>
                                        </div>
                                        <div class="absolute">
                                            <p>Salah satu cara untuk mendukung para petani Indonesia dalam mengatasi
                                                permasalahan
                                                dibidang pertanian yakni memberikan solusi untuk bertukar informasi
                                                di bidang pertanian melalui aplikasi SiTans</p>
                                            <p><a href="#" class="custom-btn">Info lebih lanjut</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-12 portfolio-wrap">
                    <div class="row no-gutters align-items-center">
                        <div class="col-md-5 order-md-last img js-fullheight"
                            style="background-image: url({{ asset('landing/images/petani2.png') }});">

                        </div>
                        <div class="col-md-7">
                            <div class="text pt-5 pr-md-5 ftco-animate">
                                <div class="px-4 px-lg-4">
                                    <div class="desc text-md-right">
                                        <div class="top">
                                            <h2 class="mb-4"><a style="font-size: 55px;" href="#">Pentingnya
                                                    <br> Penyuluhan dibidang <br> Pertanian</a></h2>
                                        </div>
                                        <div class="absolute">
                                            <p>Penyuluhan dapat juga berperan dalam menyampaikan informasi dibidang
                                                pertanian,
                                                memberikan dorongan bagi para petani, dan juga penyampaian aspirasi
                                                petani. </p>
                                            <p><a href="#" class="custom-btn">Info lebih lanjut</a></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">
                        <h2>Artikel</h2>
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 ftco-animate">
                    <div class="block-7">
                        <div class="img"
                            style="background-image: url({{ asset('landing/images/artikel1.png') }});"></div>
                        <div class="text text-center" style="padding-top: 20px;">
                            <h4><b><span>Pupuk untuk Buah <br> Jeruk</span></b></h4>
                            <p><span>pupuk yang cocok untuk <br> tanaman buah jeruk adalah ...</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="block-7">
                        <div class="img"
                            style="background-image: url({{ asset('landing/images/artikel2.png') }});"></div>
                        <div class="text text-center" style="padding-top: 20px;">
                            <h4><b><span>Pupuk untuk Buah <br> Jeruk</span></b></h4>
                            <p><span>pupuk yang cocok untuk <br> tanaman buah jeruk adalah ...</span></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 ftco-animate">
                    <div class="block-7">
                        <div class="img"
                            style="background-image: url({{ asset('landing/images/artikel3.png') }});"></div>
                        <div class="text text-center" style="padding-top: 20px;">
                            <h4><b><span>Pupuk untuk Buah <br> Jeruk</span></b></h4>
                            <p><span>pupuk yang cocok untuk <br> tanaman buah jeruk adalah ...</span></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="kontak" class="ftco-section contact-section">
        <div class="container">
            <div class="row justify-content-center mb-5">
                <div class="col-md-7 heading-section text-center ftco-animate">
                    <span class="subheading">Kontak</span>
                    <h2>Hubungi Kami</h2>
                </div>
            </div>
            <div class="row d-flex mb-5 contact-info justify-content-center">
                <div class="col-md-8">
                    <div class="row mb-5">
                        <div class="col-md-4 text-center py-4">
                            <div class="icon">
                                <span class="fa fa-map"></span>
                            </div>
                            <p><span>Alamat:</span> Kabupaten Bondowoso</p>
                        </div>
                        <div class="col-md-4 text-center border-height py-4">
                            <div class="icon">
                                <span class="fa fa-phone"></span>
                            </div>
                            <p><span>Telepon:</span> <a href="tel://1234567920">081230187585</a></p>
                        </div>
                        <div class="col-md-4 text-center py-4">
                            <div class="icon">
                                <span class="fa fa-paper-plane"></span>
                            </div>
                            <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@yoursite.com</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
