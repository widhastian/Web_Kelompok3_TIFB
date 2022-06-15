 <!-- Modal -->
 <div class="modal fade" id="modalReadDes{{ $des->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Read Data Desa</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {{-- FORM INPUT --}}
             <form action="" method="POST">
                 @csrf
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="kecamatan-option">Nama Kecamatan</label>
                         <input type="text" class="form-control" name="id_kecamatan" id="id_kecamatan"
                             placeholder="Enter Kecamatan " value="{{ $des->kecFK->nama_kecamatan }}" disabled>
                     </div>
                     <div class="form-group">
                         <label for="Nama">Nama Desa</label>
                         <input type="text" class="form-control" name="nama_desa" id="nama_desa"
                             placeholder="Enter Nama " value="{{ $des->nama_desa }}" disabled>
                     </div>
                 </div>
             </form>
             {{-- AKHIR FORM INPUT --}}
         </div>
     </div>
 </div>
