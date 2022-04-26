@extends('layouts.admin.main')
@push('style-custom')
    <style>
        .dblock {
            display: inline-block;
            overflow: hidden !important;
            width: 80%;
            text-overflow: ellipsis;
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputModalDes"
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
                                <th scope="col">Foto</th>
                                <th scope="col">Video</th>
                                <th scope="col" style="width: 30%">Deskripsi</th>
                                <th scope="col">Kategori Artikel</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataArtikel as $art)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $loop->iteration }}</td>
                                    @if (Auth::user()->id_level == 1)
                                        <td>{{ $art->userFK->name }}</td>
                                    @endif
                                    <td> <img src="{{ asset('files/artikel/' . $art['foto']) }}" style="width: 68px"
                                            alt="foto ni ges"></td>
                                    <td>{{ $art['video'] }}</td>
                                    <td><span class="dblock">{{ $art['deskripsi'] }}</span>
                                    </td>
                                    @if (Auth::user()->id_level != 1)
                                        <td>{{ $art['kategori'] }}</td>
                                    @else
                                        <td>{{ $art->katFK->nama_kategori }}</td>
                                    @endif
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalEditDes{{ $art['id'] }}">
                                            <i class="fas fa-fw fa-pencil-alt"></i>
                                        </a> -
                                        <a href="{{ route('deleteDes', $art['id']) }}" class="btn btn-sm btn-danger"><i
                                                class="fas fa-fw fa-trash-alt"></i></a>
                                    </td>
                                    {{-- @include('contentadmin.desa.edit-desa') --}}
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!--Row-->
@endsection

{{-- @push('script-custom')
    <script>
        Swal.fire('Any fool can use a computer')
    </script>
@endpush --}}
