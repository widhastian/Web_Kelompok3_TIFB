<?php

namespace App\Http\Controllers\LandingPage;

use App\Http\Controllers\Controller;
use App\Models\Percakapan;
use App\Models\Pesan;
use App\Models\User;
use Illuminate\Http\Request;
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
        $data = $this->ambilPesan(); // panggil fungsi ambilPesan
        // dd($data);

        if (Auth()->user()->id_level == 3 && $data != '0') {
            return view('content-landing.chat.chat', $data);
        } else {
            return view('content-landing.chat.chat-kosong');
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
            'pesanTeks' => 'required',
            'idPk' => 'required',
            'idPtg' => 'required',
        ]);

        $idLogin = Auth()->id();
        if ($request->idPk == 0) {
            $id = Percakapan::insertGetId([
                'user_satu' => $request->idPtg,
                'user_dua' => $idLogin,
            ]);
            Pesan::create([
                'id_percakapan' => $id,
                'id_user' => $idLogin,
                'isi' => $request->pesanTeks,
            ]);
            $pesan = $this->ambilPesan()['output'];
            return response()->json([
                'idPck' => $id,
                'pesan' => $pesan,
            ]);
        } else {
            Pesan::create([
                'id_percakapan' => $request->idPk,
                'id_user' => $idLogin,
                'isi' => $request->pesanTeks,
            ]);
            $pesan = $this->ambilPesan()['output'];
            return response()->json([
                'idPck' => $request->idPk,
                'pesan' => $pesan,
            ]);
        }
    }

    public function realtimeLanding()
    {
        $idLogin = Auth()->id();
        $data = $this->ambilPesan();

        $dummy = 0;
        $psnBaru = 0;
        foreach ($data['pesan'] as $d) {
            if (($d->status == 'baru') && $d->id_user == $data['user']['idPetugas']) {
                DB::table('pesan')->where('id', $d->id)->update([
                    'status' => 'dibaca'
                ]);
                $psnBaru++;
            }
        }
        if ($psnBaru != 0) {
            $pesan = $this->ambilPesan()['output'];
            return $pesan;
            // break;
        }
        return $dummy;
    }

    public function ambilPesan()
    {
        $idLogin = Auth()->id();
        $idKec = Auth()->user()->id_kecamatan;


        $petugas = User::where('id_level', 2) // 2 adalah level petugas
            ->where('id_kecamatan', $idKec)
            ->first();
        if ($petugas) {


            $pk = Percakapan::where('user_satu', $idLogin)
                ->where('user_dua', $petugas->id)
                ->first();

            $pk2 = Percakapan::where('user_satu', $petugas->id)
                ->where('user_dua', $idLogin)
                ->first();

            if ($pk) {
                $idPk = $pk->id;
            } elseif ($pk2) {
                $idPk = $pk2->id;
            } else {
                $idPk = 0;
            }

            $pesan = Pesan::with('user')->where('id_percakapan', $idPk)->get();
            $user = [
                'idPetugas' => $petugas->id,
                'namaPetugas' => $petugas->name,
                'fotoPetugas' => $petugas->foto,
                'idPck' => $idPk,
            ];

            // output chat yang ditampilkan
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

            $data = [
                'user' => $user,
                'pesan' => $pesan,
                'output' => $output
            ];

            return $data;
        } else {
            return '0';
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
     * Display the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function show(ChatCtrl $chat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatCtrl $chat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChatCtrl $chat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Chat  $chat
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChatCtrl $chat)
    {
        //
    }
}
