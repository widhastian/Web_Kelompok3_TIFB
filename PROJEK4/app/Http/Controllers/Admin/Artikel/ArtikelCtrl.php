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
        //dd
        if (Auth::user()->id_level != 3) {
            if (Auth::user()->id_level == 1) {
                return view('contentadmin.artikel.artikel', [
                    'dataKategori' => $kategori,
                    'dataArtikel' => $artikel,
                ]);
            } else {
                return view('contentadmin.artikel.artikel', [
                    'dataKategori' => $kategori,
                    'dataArtikel' => $artikel,
                ]);
            }
        } else {
            return view('content-landing.beranda');
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
            'deskripsi' => 'required',
        ]);

        if (!empty($request->foto)) {
            $nameImage = md5($request->foto . microtime() . '.' . $request->foto->extension());
            $request->foto->move(public_path('files/artikel'), $nameImage);
        } else {
            $nameImage = '';
        }

        if (!empty($request->video)) {
            $linkVideo = $request->video;
        } else {
            $linkVideo = '';
        }

        Artikel::create([
            'id_kategori' => $request->id_kategori,
            'judul' => $request->judul,
            'foto' => $nameImage,
            'video' => strip_tags($linkVideo),
            'deskripsi' => strip_tags($request->deskripsi),
            'id_user' => Auth()->id(),
        ]);

        return redirect()->route('admin-artikel')->with('success', 'Data Berhasil Disimpan!');
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
            'deskripsi' => 'required',
        ]);

        // dd($request->judul);

        if (!empty($request->foto)) {
            $nameImage = md5($request->foto . microtime() . '.' . $request->foto->extension());
            $request->foto->move(public_path('files/artikel'), $nameImage);

            $art = Artikel::findOrFail($id);
            $art->update([
                'id_kategori' => $request->id_kategori,
                'judul' => $request->judul,
                'foto' => $nameImage,
                'video' => strip_tags($request->video),
                'deskripsi' => strip_tags($request->deskripsi),
                'id_user' => Auth()->id(),
            ]);
        } else {
            $art = Artikel::findOrFail($id);
            $art->update([
                'id_kategori' => $request->id_kategori,
                'judul' => $request->judul,
                'video' => strip_tags($request->video),
                'deskripsi' => strip_tags($request->deskripsi),
                'id_user' => Auth()->id(),
            ]);
        }

        // if (!empty($request->video)) {
        //     $linkVideo = $request->video;
        // } else {
        //     $linkVideo = '';
        // }



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
