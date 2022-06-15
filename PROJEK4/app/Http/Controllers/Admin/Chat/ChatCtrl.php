<?php

namespace App\Http\Controllers\Admin\Chat;

use App\Http\Controllers\Controller;
use App\Models\Percakapan;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ChatCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // USER SATU PETUGAS
        // USER DUA PETANI

        $idLogin = Auth()->id();

        // $data = $this->show($request,10);

        $pck = Percakapan::with('pesan', 'userDua')
            ->where('user_satu', $idLogin)
            ->get();

        if (Auth()->user()->id_level != 3) {
            return view('contentadmin.chat.chat', [
                'dataPck' => $pck,
            ]);
        } else {
            return view('tidakBisaAkses');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'pesanTeks' => 'required',
            'idPck' => 'required',
        ]);

        $idLogin = Auth()->id();

        if ($request->idPck != 0) {
            Pesan::create([
                'id_percakapan' => $request->idPck,
                'id_user' => $idLogin,
                'isi' => $request->pesanTeks,
            ]);
            $pesan = $this->ambilPesan($request->idPck);
            return response()->json([
                'success' => $request->idPck,
                'pesan' => $pesan,
            ]);
        }
    }

    public function show(Request $request)
    {

        $data = $this->ambilPesan($request->id);

        return $data;
        // return response()->json(['success' => $output]);
    }


    public function realtimeAdmin(Request $request)
    {
        $idLogin = Auth()->id();
        // $data = $this->ambilPesan($request->id);
        $data = Pesan::with('user')
            ->where('id_percakapan', $request->id)
            ->get();
        // dd($data);

        $dummy = 0;
        $psnBaru = 0;
        foreach ($data as $d) {
            if (($d->status == 'baru') && ($d->id_user != $idLogin)) {
                DB::table('pesan')->where('id', $d->id)->update([
                    'status' => 'dibaca'
                ]);
                $psnBaru++;
            }
        }
        if ($psnBaru != 0) {
            $pesan = $this->ambilPesan($request->id);
            return $pesan;
        }
        return $dummy;
        // return response()->json(['success' => $data]);

    }

    // public function ambilPesan(Request $request)
    public function ambilPesan($id)
    {
        $idLogin = Auth()->id();
        $idPck = $id; // id percakapan

        $pesan = Pesan::with('user')->where('id_percakapan', $idPck)->get();

        $output = "";
        foreach ($pesan as $p) {
            if ($p->id_user == $idLogin) {
                $output .= '<div class="message parker">
                                    ' . $p->isi . '
                            </div>';
            } else {
                $output .= '<div class="message stark">
                                    ' . $p->isi . '
                            </div>';
            }
        }
        return $output;
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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

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
        //
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
