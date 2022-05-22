<?php

namespace App\Http\Controllers\Admin\Desa;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Desa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DesaCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        $desa = Desa::with('kecFK')->get();
        // dd($desa);

        if (Auth::user()->id_level == 3) {
            return view('tidakBisaAkses');
        } else {
            return view('contentadmin.desa.desa', [
                'dataKecamatan' => $kecamatan,
                'dataDesa' => $desa,
            ]);
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
            'nama_desa' => 'required',
            'id_kecamatan' => 'required'
        ]);
        Desa::create([
            'nama_desa' => $request->nama_desa,
            'id_kecamatan' => $request->id_kecamatan
        ]);
        return redirect()->route('admin-desa');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function show(Desa $desa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function edit(Desa $desa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('desa')->where('id', $id)->update([
            'nama_desa' => $request->nama_desa,
            'id_kecamatan' => $request->id_kecamatan
        ]);
        return redirect()->route('admin-desa');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Desa  $desa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('desa')->where('id', $id)->delete();
        return redirect()->route('admin-desa');
    }
}
