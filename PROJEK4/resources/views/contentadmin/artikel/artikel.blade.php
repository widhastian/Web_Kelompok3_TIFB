@extends('layouts.admin.main')
@push('style-custom')
    <style>
        .dblock {
            white-space: nowrap;
            width: 80px;
            overflow: hidden;
            text-overflow: ellipsis;
            /* border: 1px solid #000000; */
        }
    </style>
@endpush
@section('content-admin')
    <!-- Row -->
    <div class="row">
        <!-- DataTable -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#inputModalDes"
                        id="#myBtn">
                        <i class="fas fa-fw fa-plus"></i> Tambah Data
                    </button>
                    @include('contentadmin.artikel.input-artikel')
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                @if (Auth::user()->id_level == 1)
                                    <th scope="col">Petugas</th>
                                @endif
                                <th scope="col">Judul</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Video</th>
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Kategori Artikel</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataArtikel as $art)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $loop->iteration }}</td>
                                    @if (Auth::user()->id_level == 1)
                                        <td>
                                            <div class="dblock">{{ $art->userFK->name }}</div>
                                        </td>
                                    @endif
                                    <td>
                                        <div class="dblock">{{ $art['judul'] }}</div>
                                    </td>
                                    <td> <img src="{{ asset('files/artikel/' . $art['foto']) }}" style="width: 68px"
                                            alt="gbr"></td>
                                    <td>
                                        <div class="dblock">{{ $art['video'] }}</div>
                                    </td>
                                    <td>
                                        <div class="dblock">{{ $art['deskripsi'] }}</div>
                                    </td>

                                    <td>
                                        <div class="dblock">{{ $art->katFK->nama_kategori }}</div>
                                    </td>
                                    {{-- @if (Auth::user()->id_level != 1)
                                        <td>{{ $art['kategori'] }}</td>
                                    @else
                                        <td>{{ $art->katFK->nama_kategori }}</td>
                                    @endif --}}
                                    <td>
                                        <a href="" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#modalReadArt{{ $art->id }}">
                                            <i class="fas fa-fw fa-eye"></i>
                                        </a>
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalEditArt{{ $art['id'] }}">
                                            <i class="fas fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('deleteArt', $art['id']) }}" class="btn btn-sm btn-danger"><i
                                                class="fas fa-fw fa-trash-alt"></i></a>
                                    </td>
                                    @include('contentadmin.artikel.edit-artikel')
                                    @include('contentadmin.artikel.read-artikel')
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    @include('sweetalert::alert')
    <!--Row-->
@endsection

{{-- @push('script-custom')
    <script>
        Swal.fire('Any fool can use a computer')
    </script>
@endpush --}}
