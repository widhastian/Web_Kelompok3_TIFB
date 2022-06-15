@extends('layouts.landing.main')
@push('style-custom')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'>
@endpush

@section('content-landing')
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-sm-12 col-md-10 col-lg-8 ftco-animate fadeInUp">
                    <div class="">
                        <h1>Tidak Dapat Mengakses Halaman Ini !</h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
