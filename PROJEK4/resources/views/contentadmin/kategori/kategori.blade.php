@extends('layouts.admin.main')
@section('content-admin')
    <!-- Row -->
    <div class="row">
        <!-- DataTable -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#inputModalKtg"
                        id="#myBtn">
                        <i class="fas fa-fw fa-plus"></i> Tambah Data
                    </button>
                    @include('contentadmin.kategori.input-kategori')
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kategori</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKategori as $ktg)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $loop->iteration }}</td>
                                    <td>{{ $ktg->nama_kategori }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-warning" data-toggle="modal"
                                            data-target="#modalEditKt{{ $ktg->id }}">
                                            <i class="fas fa-fw fa-eye"></i>
                                        </a>
                                        {{-- <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalReadKtg{{ $ktg->id }}">
                                            <i class="fas fa-fw fa-pencil-alt"></i>
                                        </a> --}}
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalEditKtg{{ $ktg->id }}">
                                            <i class="fas fa-fw fa-pencil-alt"></i>
                                        </a>
                                        <a href="{{ route('deleteKtg', $ktg->id) }}" class="btn btn-sm btn-danger"><i
                                                class="fas fa-fw fa-trash-alt"></i>
                                        </a>
                                    </td>
                                    @include('contentadmin.kategori.edit-kategori')
                                    @include('contentadmin.kategori.read-kategori')
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
    <!--Row-->
    @include('sweetalert::alert')
@endsection
