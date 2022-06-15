<nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
    <div class="container-fluid">
        <img style="border-radius: 150px; width: 50px;" src="{{ asset('landing/images/logo.jpeg') }}">
        <a class="navbar-brand" style="padding-left: 20px;" href="index.html">GoFarm</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
            aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="oi oi-menu"></span> Menu
        </button>

        <div class="collapse navbar-collapse" id="ftco-nav">
            <ul class="navbar-nav ml-auto">
                @guest
                    <li class="nav-item {{ Nav::isRoute('home') }}"><a href="{{ route('home') }}"
                            class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link">Tentang</a></li>
                    <li class="nav-item"><a href="#kontak" class="nav-link">Kontak</a></li>
                    <li class="nav-item {{ Nav::isRoute('page-login') }}"><a href="{{ route('page-login') }}"
                            class="nav-link" style=" margin-left: 70px;">
                            Login</a></li>
                    <li class="nav-item cta"><a href="{{ route('page-register') }}"
                            class="
                        nav-link"><span>Registrasi</span></a></li>
                    {{-- <li class="nav-item {{ Nav::isRoute('login') }}"><a href="{{ route('login') }}"
                            class="nav-link">Login</a></li> --}}
                @else
                    <li class="nav-item {{ Nav::isRoute('home') }}"><a href="{{ route('home') }}"
                            class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#about" class="nav-link">Tentang</a></li>
                    <li class="nav-item"><a href="{{ route('artikelLan') }}" class="nav-link">Artikel</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Kontak</a></li>
                    <li class="nav-item {{ Nav::isRoute('landing-chat') }}"><a href="{{ route('landing-chat') }}"
                            class="nav-link">Chat</a></li>
                    <li class="nav-item cta">
                        <a class="nav-link" href="javascript:void(0);" data-toggle="modal"
                            data-target="#logoutModal"><span>Logout</span>
                        </a>
                    </li>

                    {{-- <li class="nav-item"> <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();                                                                                                                                           document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li> --}}
                    <li class="nav-item"><img
                            style="border-radius: 150px; width: 50px; height: 50px; margin-left: 70px;"
                            src="{{ asset('files/foto-profile/' . auth()->user()->foto) }}"></li>
                    <li class="nav-item"><a href="{{ route('landing-users') }}"
                            class="nav-link">{{ $nama = Auth::user() ? Auth::user()->name : '' }}</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<!-- END nav -->
<!--- Modal logout -->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabelLogout"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabelLogout">Ohh No!</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Are you sure you want to logout?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
    </div>
</div>
<!--- Modal logout -->
