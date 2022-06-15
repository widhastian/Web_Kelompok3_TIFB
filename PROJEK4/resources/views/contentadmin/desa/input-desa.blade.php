 <!-- Modal -->
 <div class="modal fade" id="inputModalDes" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Tambah Data Desa</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {{-- FORM INPUT --}}
             <form action="{{ route('admin-desaStore') }}" method="POST">
                 @csrf
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="kecamatan-option">Nama Kecamatan</label>
                         <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                             <option>-Pilih Kecamatan-</option>
                             @foreach ($dataKecamatan as $dk)
                                 <option value="{{ $dk->id }}">{{ $dk->nama_kecamatan }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="Nama">Nama Desa</label>
                         <input type="text" class="form-control" name="nama_desa" id="nama_desa"
                             placeholder="Enter Nama " value="{{ old('nama_desa') }}">
                         @error('nama_desa')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                 </div>
             </form>
             {{-- AKHIR FORM INPUT --}}
         </div>
     </div>
 </div>
