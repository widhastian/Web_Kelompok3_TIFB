<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Kategori as kt;
use App\Models\Kategori as ModelsKategori;
use GrahamCampbell\ResultType\Success;

class kategori extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kategori = kt::get();
        return response()->json([
            'message' => 'Success',
            'message' => $kategori,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getKat($id)
    {
        $kategori = ModelsKategori::find($id);
        return response()->json($kategori, 200);
    }
    public function create(Request $request)
    {
        try {
            $request->validate([
                'nama_kategori' => 'required',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Data Tidak Lengkap'
            ], 401);
        }

        ModelsKategori::create($request->all());

        return response()->json([
            'status' => 'ok',
            'message' => 'Kategori Berhasil Ditambahkan'
        ], 201);
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
        try {
            $request->validate([
                'nama_kategori' => 'required',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Data Tidak Lengkap'
            ], 401);
        }

        ModelsKategori::where('id', $id)->update($request->all());

        // $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'message' => 'Sukses Update ',
        ];

        return response($response, 201);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        ModelsKategori::destroy($id);
        return response()->json([
            'status' => 'ok',
            'message' => 'Kategori berhasil dihapus'
        ], 201);
    }
}
