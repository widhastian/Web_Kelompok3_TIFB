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
                        <div class="chat">
                            <div class="contact bar">
                                <h6>Tidak ada Petugas di Kecamatan ini</h6>
                            </div>
                            <div class="messages" id="listPesan">
                                <h2 style="text-align: center; color: #d6d6d6">Tidak dapat mengirim pesan !</h2>
                            </div>
                            <div class="input">

                                <input type="text" name="pesanTeks" id="pesanTeks" placeholder="Type your message here!"
                                    type="text" disabled />
                                <i class="fas fa-paper-plane" id="btnKirim" @disabled(true)></i>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
