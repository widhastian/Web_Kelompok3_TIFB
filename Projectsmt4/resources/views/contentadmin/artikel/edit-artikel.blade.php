 <!-- Modal -->
 <div class="modal fade" id="modalEditArt{{ $art->id }}" tabindex="-1" role="dialog"
     aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog modal-lg" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLabel">Edit Data Artikel</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             {{-- FORM INPUT --}}
             <form action="{{ 'admin-artikelUpdate', $art->id }}" method="POST">
                 @csrf
                 <div class="modal-body">
                     <div class="form-group">
                         <div class="form-group">
                             <label for="judul">Judul</label>
                             <input type="text" class="form-control" name="judul" id="judul" placeholder="Enter Judul "
                                 value="{{ $art->judul }}">
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="user-option">Nama Kategori Artikel</label>
                         <select class="form-control" id="id_kategori" name="id_kategori">
                             <option>{{ $art->katFK->nama_kategori }}</option>
                             <option>-Pilih Kategori-</option>
                             @foreach ($dataKategori as $ktg)
                                 <option value="{{ $ktg->id }}">{{ $ktg->nama_kategori }}</option>
                             @endforeach
                         </select>
                     </div>
                     <div class="form-group">
                         <div class="custom-file">
                             <input type="file" class="custom-file-input" name="foto" id="foto"
                                 value="{{ $art->foto }}">
                             <label class="custom-file-label" for="foto">Input Images</label>
                         </div>
                     </div>
                     <div class="form-group">
                         <div class="form-group">
                             <label for="video">Video</label>
                             <input type="text" class="form-control" name="video" id="video"
                                 placeholder="Enter Video " value="{{ $art->video }}">
                         </div>
                     </div>
                     <div class="form-group">
                         <label for="deskripsi">Deskripsi Artikel</label>
                         <input id="deskripsi" type="hidden" name="deskripsi" value="{{ $art->deskripsi }}">
                         <trix-editor input="deskripsi"></trix-editor>
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
