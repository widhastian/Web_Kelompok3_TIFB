<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MultiUser extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Auth::user()->id_level);
        if (empty(Auth::user()) || Auth::user()->id_level == '3') {
            return view('content-landing.beranda');
        } else {
            return view('contentadmin.beranda');
        }
    }
}
