@extends('layouts.landing.main')
@section('content-landing')
    <section class="ftco-section">
        <div class="container">
            <div class="row block-9 justify-content-center mb-5">
                <div class="col-md-8 mb-md-5">
                    <div class="top">
                        <h2 class="mb-4"><a style="font-size: 55px;" href="#">Login</a></h2>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Your Password">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary py-3 px-5">
                                Login
                            </button>
                        </div>
                    </form>
                    {{-- <h2 class="text-center mt-5">If you got any questions please do not hesitate to send us a message</h2> --}}
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="ftco-section contact-section">
        <div class="container">
            <div class="row block-9 justify-content-center mb-5">
                <div class="col-md-8 mb-md-5">
                    <div class="top">
                        <h2 class="mb-4"><a style="font-size: 55px;" href="#">Login</a></h2>
                    </div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="form-group">
                            <label for="email"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                                placeholder="Your Email">
                        </div>
                        <div class="form-group">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <input id="password" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password" required
                                autocomplete="current-password" placeholder="Your Password">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary py-3 px-5">
                                Login
                            </button>
                        </div>
                    </form>
                    <h2 class="text-center mt-5">If you got any questions please do not hesitate to send us a message</h2>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
