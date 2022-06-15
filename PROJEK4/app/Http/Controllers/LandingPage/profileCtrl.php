<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Desa;
use App\Models\Kecamatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class profileCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idlog = Auth()->id();
        $usbar = new User();
        $dt1 = $usbar->getAkun($idlog);
        if ($dt1 != '0') {
            $dataAkun = $dt1;
        } else {
            $dataAkun = [User::find($idlog)];
        }
        $kecamatan = Kecamatan::all();
        $desa = Desa::with('kecFK')->get();
        $data = [
            'dataAkun' => $dataAkun,
            'dataKecamatan' => $kecamatan,
            'dataDesa' => $desa,
        ];
        return view('content-landing.profile.users-profile', $data);
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
        //
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
        if (empty($request->password)) {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'id_desa' => 'required',
                'id_kecamatan' => 'required',
            ]);
            User::where('id', $id)
                ->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'alamat' => $request->alamat,
                    'id_desa' => $request->id_desa,
                    'id_kecamatan' => $request->id_kecamatan,
                ]);
        } else {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'alamat' => 'required',
                'id_desa' => 'required',
                'id_kecamatan' => 'required',
                'password_old' => 'required|min:8',
                'password' => 'required|min:8',
                'password_confirmation' => 'required_with:password|same:password|min:8',
            ]);
            $user = User::find($id);
            if (!Hash::check($request->password_old, $user->password)) {
                echo "Password Lama Salah";
                return redirect()->route('admin-tidakbisaakses');
            } else {
                User::where('id', $id)
                    ->update([
                        'name' => $request->name,
                        'email' => $request->email,
                        'alamat' => $request->alamat,
                        'id_desa' => $request->id_desa,
                        'id_kecamatan' => $request->id_kecamatan,
                        'password' => Hash::make($request->password)
                    ]);
            }
        }
        return redirect()->route('landing-users');
    }

    public function updateFoto(Request $request, $id)
    {
        $request->validate([
            'foto' => 'required|image',
        ]);

        $foto = md5($request->foto . microtime() . '.' . $request->foto->extension());
        $request->foto->move(public_path('files/foto-profile'), $foto);

        User::where('id', $id)
            ->update([
                'foto' => $foto,
            ]);

        return redirect()->route('landing-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
