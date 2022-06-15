 <!-- Modal -->
 <div class="modal fade" id="inputModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Tambah Data Petugas</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {{-- FORM INPUT --}}
             <form action="{{ route('admin-petugasStore') }}" method="POST">
                 @csrf
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="Nama">Nama Lengkap</label>
                         <input type="text" class="form-control" name="name" id="name" placeholder="Enter Nama "
                             value="{{ old('name') }}">
                         @error('name')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                     <div class="form-group">
                         <label for="user-option">Nama Kecamatan</label>
                         <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                             <option>-Pilih Kecamatan-</option>
                             @foreach ($dataKecamatan as $kec)
                                 <option value="{{ $kec->id }}">{{ $kec->nama_kecamatan }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Email</label>
                         <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                             placeholder="Enter email" value="{{ old('email') }}">
                         @error('email')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                     <div class="form-group">
                         <label for="exampleInputPassword1">Password</label>
                         <input type="password" class="form-control" name="password" id="password"
                             placeholder="Password" value="{{ old('password') }}">
                         @error('pasword')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                     <div class="form-group">
                         <label for="exampleInputPassword1">Tulis Ulang Password</label>
                         <input type="password" class="form-control" name="password_confirmation"
                             id="password_confirmation" placeholder="Tulis Ulang Password"
                             value="{{ old('password_confirmation') }}">
                         @error('password_confirmation')
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
