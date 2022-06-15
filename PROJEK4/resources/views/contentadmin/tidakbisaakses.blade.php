@extends('layouts.admin.main')
@push('style-custom')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'>

    <style>
        .kasta {
            z-index: 99;
        }
    </style>
@endpush

@section('content-admin')
    <div class="container ">
        <div class="row justify-content-center ml-5">
            <div class="col-lg-6 ml-5">
                <div class="center">
                    <h1>Tidak Bisa Akses Halaman Ini</h1>
                </div>
            </div>
        </div>
    </div>
@endsection
