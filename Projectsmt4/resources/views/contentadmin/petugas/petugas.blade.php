@extends('layouts.admin.main')
@section('content-admin')
    <!-- Row -->
    <div class="row">
        <!-- DataTable -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#inputModal" id="#myBtn">
                        <i class="fas fa-fw fa-plus"></i> Tambah Data
                    </button>
                    @include('contentadmin.petugas.input-petugas')
                </div>
                <div class="card-body">
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
                            @foreach ($dataPetugas as $ptg)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $loop->iteration }}</td>
                                    <td>{{ $ptg->name }}</td>
                                    <td>{{ $ptg->email }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalEdit{{ $ptg->id }}">
                                            <i class="fas fa-fw fa-pen-alt"></i>
                                        </a>
                                        <a href="{{ route('delete', $ptg->id) }}" class="btn btn-sm btn-danger"><i
                                                class="fas fa-fw fa-trash-alt"></i></a>
                                    </td>
                                    @include('contentadmin.petugas.edit-petugas')
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
