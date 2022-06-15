 <!-- Modal -->
 <div class="modal fade" id="modalEditKt{{ $ktg->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Read Data Kategori</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {{-- FORM INPUT --}}
             <form action="{{ route('admin-kategoriUpdate', $ktg->id) }}" method="POST">
                 @csrf
                 <div class="modal-body">
                     <div class="form-group">
                         <label for="Nama">Nama Kategori</label>
                         <input type="text" class="form-control" name="nama_kategori" id="nama_kategori"
                             placeholder="Enter Nama " value="{{ $ktg->nama_kategori }}" disabled>
                     </div>
                 </div>
                 {{-- <div class="modal-footer">
                     <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Close</button>
                     <button type="submit" class="btn btn-primary">Simpan</button>
                 </div> --}}
             </form>
             {{-- AKHIR FORM INPUT --}}
         </div>
     </div>
 </div>
