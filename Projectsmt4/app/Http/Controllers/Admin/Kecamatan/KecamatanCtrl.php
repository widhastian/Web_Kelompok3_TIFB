<?php

namespace App\Http\Controllers\Admin\Kecamatan;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KecamatanCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        // if (Auth::user()->id_level == 1 || Auth::user()->id_level == 2) {
        //     return view('contentadmin.kecamatan.kecamatan', [
        //         'dataKecamatan' => $kecamatan,
        //     ]);
        // } else {
        //     return view('tidakBisaAkses');
        // }

        if (Auth::user()->id_level == 3) {
            return view('tidakBisaAkses');
        } else {
            return view('contentadmin.kecamatan.kecamatan', [
                'dataKecamatan' => $kecamatan,
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
        //
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
            'nama_kecamatan' => 'required'
        ]);
        Kecamatan::create([
            'nama_kecamatan' => $request->nama_kecamatan
        ]);
        return redirect()->route('admin-kecamatan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('kecamatan')->where('id', $id)->update([
            'nama_kecamatan' => $request->nama_kecamatan
        ]);
        return
            redirect()->route('admin-kecamatan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('kecamatan')->where('id', $id)->delete();
        return redirect()->route('admin-kecamatan');
    }
}
