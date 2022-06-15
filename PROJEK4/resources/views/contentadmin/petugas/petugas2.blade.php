@extends('layouts.admin.main')
@section('content-admin')
    <div class="container-fluid" id="container-wrapper">
        <!-- Row -->
        <div class="row">
            <!-- DataTable -->
            <div class="col-lg-12">
                <div class="card mb-4 p-3">
                    <table id="example1" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- $dataPetugas2 diambil dari Controller Petugas2 --}}
                            @foreach ($dataPetugas2 as $pg)
                                <tr role="row" class="odd">
                                    {{-- mengambil nomor secara otomatis --}}
                                    <td class="sorting_1">{{ $loop->iteration }}</td>
                                    <td>{{ $pg->name }}</td>
                                    <td>{{ $pg->name }}</td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info">Detail</a> - <a href="#"
                                            class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!--Row-->
    </div>
@endsection
