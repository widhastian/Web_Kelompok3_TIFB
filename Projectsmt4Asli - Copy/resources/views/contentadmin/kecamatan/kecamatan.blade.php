@extends('layouts.admin.main')
@section('content-admin')
    <!-- Row -->
    <div class="row">
        <!-- DataTable -->
        <div class="col-lg-12">
            <div class="card mb-4">
                <div class="card-header">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#inputModalKec"
                        id="#myBtn">
                        <i class="fas fa-fw fa-plus"></i> Tambah Data
                    </button>
                    @include('contentadmin.kecamatan.input-kecamatan')
                </div>
                <div class="card-body">
                    <table id="example1" class="table table-hover">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Kecamatan</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($dataKecamatan as $kec)
                                <tr role="row" class="odd">
                                    <td class="sorting_1">{{ $loop->iteration }}</td>
                                    <td>{{ $kec->nama_kecamatan }}</td>
                                    <td>
                                        <a href="" class="btn btn-sm btn-info" data-toggle="modal"
                                            data-target="#modalEditKec{{ $kec->id }}">
                                            <i class="fas fa-fw fa-pencil-alt"></i>
                                        </a> -
                                        <a href="{{ route('deleteKec', $kec->id) }}" class="btn btn-sm btn-danger"><i
                                                class="fas fa-fw fa-trash-alt"></i></a>
                                    </td>
                                    @include(
                                        'contentadmin.kecamatan.edit-kecamatan'
                                    )
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
