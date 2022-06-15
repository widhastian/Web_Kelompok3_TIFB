<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as us;

class petugas extends Controller
{
    public function index()
    {
        $user = us::get();
        return response()->json([
            'msg' => 'Success',
            'msg' => $user,
        ]);
    }
}
