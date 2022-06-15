@extends('layouts.landing.main')
@section('content-landing')
    <section class="hero-wrap hero-wrap-2"
        style="height:90%; background-image: url('{{ asset('landing/images/sawah1.jpg') }}');"
        data-stellar-background-ratio="0.5">
        <div class="overlay"></div>
        <div class="container">
            <div class="row no-gutters slider-text js-fullheight align-items-end">
                <div class="col-md-9 ftco-animate pb-5">
                    <h1 class="mb-3 bread" style="color: white;">Artikel</h1>
                </div>
            </div>
        </div>
    </section>
    <section class="ftco-section">
        <div class="container">
            <div class="row d-flex">
                @foreach ($artikels as $arti)
                    <div class="col-md-3 d-flex ftco-animate">
                        <div class="blog-entry justify-content-end">
                            <div class="text">
                                <a href="blog-single.html" class="block-20 img">
                                    <img src="{{ url('files/artikel/') }}/{{ $arti->foto }}" alt="">
                                </a>
                                <div class="meta mb-3">
                                    <div><a href="#">{{ $arti->created_at }}</a></div>
                                    <div><a href="#">{{ $arti->userFK->name }}</a></div>
                                </div>
                                <h3 class="heading"><a
                                        href="{{ route('isi', $arti['id']) }}">{{ $arti->judul }}</a></h3>

                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col text-center">
                    <div class="block-27">

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
