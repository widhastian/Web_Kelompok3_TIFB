<?php

namespace App\Http\Controllers\Admin\Petugas;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;
// use Alert;

class Petugas extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $petugas = User::where('id_level', '2')->orderBy('id', 'DESC')->get();
        $kecamatan = Kecamatan::all();
        if (Auth::user()->id_level == 1) {
            // Alert::success('Success Title', 'Success Message');
            return view('contentadmin.petugas.petugas', [
                // key => value
                'dtPG' => $petugas,
                'dataKecamatan' => $kecamatan,
            ]);
        } else {
            return view('contentadmin.tidakbisaakses');
        }
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
            'name' => 'required',
            'id_kecamatan' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'id_kecamatan' => $request->id_kecamatan,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'id_level' => 2
        ]);

        return redirect()->route('admin-petugas');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function show(Petugas $petugas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function edit(Petugas $petugas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        DB::table('users')->where('id', $id)->update([
            'name' => $request->name,
            'id_kecamatan' => $request->id_kecamatan,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return
            redirect()->route('admin-petugas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Petugas  $petugas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return
            redirect()->route('admin-petugas');
    }
}
