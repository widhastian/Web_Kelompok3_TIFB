<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-light accordion" id="accordionSidebar">
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('admin/img/logo/logo.png') }}">
        </div>
        <div class="sidebar-brand-text mx-3">CFarmer</div>
    </a>
    <hr class="sidebar-divider my-0">
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    @if (Auth::user()->id_level == 1)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-petugas') }}">
                <i class="fas fa-fw fa-user-alt"></i>
                <span>Petugas</span></a>
        </li>
    @endif
    @if (Auth::user()->id_level != 3)
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-kecamatan') }}">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Kecamatan</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-desa') }}">
                <i class="fas fa-fw fa-file-alt"></i>
                <span>Desa</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-kategori') }}">
                <i class="fas fa-fw fa-hand-alt"></i>
                <span>Kategori</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin-artikel') }}">
                <i class="fas fa-fw fa-hand-alt"></i>
                <span>Artikel</span></a>
        </li>
    @endif

    {{-- tombol logout --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
        document.getElementById('logout-form').submit();">
            {{ __('Logout') }}
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
            @csrf
        </form>
    </li>
    {{-- akhir tombol logout --}}
    <hr class="sidebar-divider">
    <div class="version" id="version-ruangadmin"></div>
</ul>
<!-- Sidebar -->
