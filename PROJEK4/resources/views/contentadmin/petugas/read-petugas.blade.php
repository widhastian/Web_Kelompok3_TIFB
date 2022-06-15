 <!-- Modal -->
 <div class="modal fade" id="modalRead{{ $ptg->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Read Data Petugas</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {{-- FORM INPUT --}}
             <form action="" method="POST">
                 @csrf
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="Nama">Nama Lengkap</label>
                         <input type="text" class="form-control" name="name" id="name" placeholder="Enter Nama "
                             value="{{ $ptg->name }}" disabled>
                     </div>
                     <div class="form-group">
                         <label for="user-option">Nama Kecamatan</label>
                         <input type="text" class="form-control" name="id_kecamatan" id="id_kecamatan"
                             value="{{ $ptg->kecFK->nama_kecamatan }}" disabled>
                     </div>
                     <div class="form-group">
                         <label for="exampleInputEmail1">Email</label>
                         <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                             placeholder="Enter email" value="{{ $ptg->email }}" disabled>
                     </div>
                 </div>
             </form>
             {{-- AKHIR FORM INPUT --}}
         </div>
     </div>
 </div>
