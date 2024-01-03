<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show(Request $request)
    {
        $jenis_layanan = JenisLayanan::all();
        return view('pages.home.app', compact('jenis_layanan'));
    }
}