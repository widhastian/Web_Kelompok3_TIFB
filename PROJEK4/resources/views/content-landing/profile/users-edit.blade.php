 <!-- Modal -->
 <div class="modal fade" id="modalEditProfile" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Edit Data {{ $d->name }}</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {{-- FORM INPUT --}}
             <form action="{{ route('landing-usersUpdate', $d->id) }}" method="POST">
                 @csrf
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="Nama">Nama Lengkap</label>
                         <input type="text" class="form-control" name="name" id="name" placeholder="Enter Nama "
                             value="{{ $d->name }}">
                     </div>
                     <div class="form-group">
                         <label for="Nama">Alamat</label>
                         <input type="text" class="form-control" name="alamat" id="alamat" placeholder="Enter Alamat "
                             value="{{ $d->alamat }}">
                     </div>
                     <div class="form-group">
                         <label for="kecamatan-option">Nama Kecamatan</label>
                         <select class="form-control" id="id_kecamatan" name="id_kecamatan">
                             <option value="{{ $d->id_kecamatan }}">{{ $d->nama_kecamatan }}</option>
                             <option>-Pilih Kecamatan-</option>
                             @foreach ($dataKecamatan as $dk)
                                 <option value="{{ $dk->id }}">{{ $dk->nama_kecamatan }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="kecamatan-option">Nama Desa</label>
                         <select class="form-control" id="id_desa" name="id_desa">
                             <option value="{{ $d->id_desa }}">{{ $d->nama_desa }}</option>
                             <option>-Pilih Desa-</option>
                             @foreach ($dataDesa as $dk)
                                 <option value="{{ $dk->id }}">{{ $dk->nama_desa }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Email</label>
                         <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                             placeholder="Enter email" value="{{ $d->email }}">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputPassword1">Password Sebelumnya</label>
                         <input type="password" class="form-control" name="password_old" id="password"
                             placeholder="Password Lama">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputPassword1">Password</label>
                         <input type="password" class="form-control" name="password" id="password"
                             placeholder="Password baru">
                     </div>
                     <div class="form-group">
                         <label for="exampleInputPassword1">Tulis Ulang Password</label>
                         <input type="password" class="form-control" name="password_confirmation"
                             id="password_confirmation" placeholder="Tulis Ulang Password baru">
                         @error('password_confirmation')
                             <span class="text-danger">{{ $message }}</span>
                         @enderror
                     </div>
                 </div>
                 <div class="modal-footer">
                     <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Update</button>
                 </div>
             </form>
             {{-- AKHIR FORM INPUT --}}
         </div>
     </div>
 </div>
