<?php

namespace App\Http\Controllers\Admin\Artikel;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use App\Models\Kategori;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use illuminate\support\Str;
use Illuminate\Support\Facades\DB;

class ArtikelCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idUser = Auth()->id();
        $kategori = Kategori::all();
        $artikel = Artikel::with('katFK')->get();

        if (Auth::user()->id_level == 2) {
            foreach ($artikel as $t) {
                if ($t->id_user == $idUser) {
                    $dataArtPetugas[] = [
                        'id' => $t->id,
                        'judul' => $t->judul,
                        'foto' => $t->foto,
                        'video' => $t->video,
                        'deskripsi' => $t->deskripsi,
                        'kategori' => $t->katFK->nama_kategori,
                    ];
                }
            }
        }

        if (Auth::user()->id_level != 3) {
            if (Auth::user()->id_level == 1) {
                return view('contentadmin.artikel.artikel', [
                    'dataKategori' => $kategori,
                    'dataArtikel' => $artikel,
                ]);
            } else {
                return view('contentadmin.artikel.artikel', [
                    'dataKategori' => $kategori,
                    'dataArtikel' => $dataArtPetugas,
                ]);
            }
        } else {
            return view('tidakBisaAkses');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'id_kategori' => 'required',
            'judul' => 'required',
            'foto' => 'required|image',
            'video' => 'required',
            'deskripsi' => 'required',
        ]);

        $nameImage = md5($request->foto . microtime() . '.' . $request->foto->extension());
        $request->foto->move(public_path('files/artikel'), $nameImage);

        Artikel::create([
            'id_kategori' => $request->id_kategori,
            'judul' => $request->judul,
            'foto' => $nameImage,
            'video' => strip_tags($request->video),
            'deskripsi' => strip_tags($request->deskripsi),
            'id_user' => Auth()->id(),
        ]);

        return redirect()->route('admin-artikel');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Artikel $artikel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Artikel $artikel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'id_kategori' => 'required',
            'judul' => 'required',
            'foto' => 'required|image',
            'video' => 'required',
            'deskripsi' => 'required',
        ]);

        $nameImage = md5($request->foto . microtime() . '.' . $request->foto->extension());
        $request->foto->move(public_path('files/artikel'), $nameImage);

        Artikel::update([
            'id_kategori' => $request->id_kategori,
            'judul' => $request->judul,
            'foto' => $nameImage,
            'video' => strip_tags($request->video),
            'deskripsi' => strip_tags($request->deskripsi),
            'id_user' => Auth()->id(),
        ]);

        return redirect()->route('admin-artikel');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('artikel')->where('id', $id)->delete();
        return redirect()->route('admin-artikel');
    }
}
