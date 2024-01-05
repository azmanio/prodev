<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show(Request $request)
    {
        $jenis_layanan = JenisLayanan::all();
        return view('pages.home.app', compact('jenis_layanan'));
    }

    public function detail_service(JenisLayanan $jenis_layanan)
    {
        return view('pages.home.detail-service', compact('jenis_layanan'));
    }
}
