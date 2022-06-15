<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Account extends Controller
{
    public function regis(Request $request)
    {
        $validator = User::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'password_confirmation' =>
            'required_with:password|same:password|min:8',
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors());
        }
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'password' => Hash::make($request->password)
        ]);
        $token = $user->createToken('auth_token')->plainTextToken;
        return response()
            ->json(['data' => $user, 'access_token' => $token, 'token_type' => 'Bearer',]);
    }
    public function index($id)
    {
        $user = User::where('id', $id)->get();
        $user = User::all();
        return response()->json([
            'message' => 'success',
            'user' => $user,
        ], 201);
    }

    public function store(Request $request, $id)
    {
        $validasi = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8',
            'password_confirmation' => 'required_with:password|same:password|min:8',
        ]);
        try {
            $response = User::create($validasi);
            return response()->json([
                'message' => 'success',
                'data' => $response
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'message' => 'success',
                'errors' => $e->getMessage()
            ]);
        }
    }

    public function updatePhoto(Request $request, $id)
    {
        try {
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Foto tidak sesuai syarat'
            ], 401);
        }
        $image = $request->file('image');
        $nameImage = md5($image . microtime() . '.' . $image->extension());
        Storage::putFileAs(
            'public/img-users',
            $image,
            $nameImage
        );

        User::where('id', $id)
            ->update([
                'image' => $nameImage,
            ]);

        $response = [
            'message' => 'Berhasil perbarui foto profile'
        ];

        return response($response, 201);
    }

    public function updateBio(Request $request, $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'email' => 'required|email',
                'gender' => 'required',
                'birthday' => 'required',
                'phone_number' => 'required',
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'message' => 'Email sudah terpakai'
            ], 401);
        }


        User::where('id', $id)
            ->update($request->all());


        $response = [
            'message' => 'Data anda berhasil diperbarui',
            'id' => $id,
            'name' => $request->name,
            'email' => $request->email,
        ];

        return response($response, 201);
    }
}
