 <!-- Modal -->
 <div class="modal fade" id="modalReadArt{{ $art->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Read Data Artikel</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {{-- FORM INPUT --}}
             <form action="" method="POST">
                 @csrf
                 <div class="modal-body">
                     <div class="form-group">
                         <div class="form-group">
                             <label for="judul">Judul</label>
                             <input type="text" class="form-control" name="judul" id="judul" placeholder="Enter Judul "
                                 value="{{ $art->judul }}" disabled>
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="user-option">Nama Kategori Artikel</label>
                         <input type="text" class="form-control" name="id_ketagori" id="id_ketagori"
                             value="{{ $art->katFK->nama_kategori }}" disabled>
                     </div>
                     <div class="form-group">
                         <div class="form-group">
                             <label for="gambar">Gambar</label>
                             <img src="{{ asset('files/artikel/' . $art['foto']) }}" style="width: 70px" alt="gambar">
                         </div>
                     </div>
                     <div class="form-group">
                         <div class="form-group">
                             <label for="video">Video</label>
                             <input type="text" class="form-control" name="video" id="video"
                                 placeholder="Enter Video " value="{{ $art->video }}" disabled>
                         </div>
                     </div>
                     <div class="form-group">
                         {{-- value="{{ $art->deskripsi }}" --}}
                         <label for="deskripsi">Deskripsi Artikel</label>
                         <input class="form-control" id="deskripsi" type="text" name="deskripsi"
                             value="{{ $art->deskripsi }}" disabled>
                     </div>
                 </div>
             </form>
             {{-- AKHIR FORM INPUT --}}
         </div>
     </div>
 </div>
