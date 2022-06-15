 <!-- Modal -->
 <div class="modal fade" id="modalReadKec{{ $kec->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Read Data Kecamatan</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {{-- FORM INPUT --}}
             <form action="" method="POST">
                 @csrf
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="Nama">Nama Kecamatan</label>
                         <input type="text" class="form-control" name="nama_kecamatan" id="nama_kecamatan"
                             placeholder="Enter Nama " value="{{ $kec->nama_kecamatan }}" disabled>
                     </div>
                 </div>
             </form>
             {{-- AKHIR FORM INPUT --}}
         </div>
     </div>
 </div>
