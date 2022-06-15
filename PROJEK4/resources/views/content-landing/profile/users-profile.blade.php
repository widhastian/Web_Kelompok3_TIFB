@extends('layouts.landing.main')
@push('style-custom')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.9.0/css/all.min.css'>
@endpush

@section('content-landing')
    @php
    $d = $dataAkun[0];
    @endphp
    <section class="ftco-section">
        <div class="container ">
            <div class="row">
                <!-- DataForm -->
                <div class="col-lg-8">
                    <!-- Form Basic -->
                    <div class="card mb-4">
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <h4 class="m-0 font-weight-bold">My Profile</h4>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <div class="col-sm-8">
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            Nama Lengkap
                                        </div>
                                        <div class="col-sm-8">
                                            {{ $d->name }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            Email
                                        </div>
                                        <div class="col-sm-8">
                                            {{ $d->email }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            Alamat
                                        </div>
                                        <div class="col-sm-8">
                                            {{ $d->alamat }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            Kecamatan
                                        </div>
                                        <div class="col-sm-8">
                                            {{ $d->nama_kecamatan }}
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-4">
                                            Desa
                                        </div>
                                        <div class="col-sm-8">
                                            {{ $d->nama_desa }}
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 text-center">
                                    <img class="img-profile rounded-circle mb-2"
                                        src=" {{ asset("files/foto-profile/$d->foto") }}"
                                        style="width: 150px; height: 150px;">
                                    <button type="button" class="btn btn-sm btn-outline-dark" data-toggle="modal"
                                        data-target="#modalEditFoto">Ubah
                                        foto</button>
                                    @include('content-landing.profile.users-editFoto')
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="button" class="btn btn-success" data-toggle="modal"
                                        data-target="#modalEditProfile">
                                        Edit Profile
                                    </button>
                                    @include('content-landing.profile.users-edit')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
