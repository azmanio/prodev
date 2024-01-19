<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\JenisLayanan;
use App\Models\Layanan;
use App\Models\PaketLayanan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function show(Request $request)
    {
        $jenis_layanan = JenisLayanan::all();
        $paket_layanan = PaketLayanan::with('layanan_options')->get();
        return view('pages.home.app', compact('jenis_layanan', 'paket_layanan'));
    }

    public function services(JenisLayanan $jenis_layanan)
    {
        return view('pages.home.list-services', compact('jenis_layanan'));
    }

    public function detail_service(JenisLayanan $jenis_layanan, Layanan $layanan)
    {
        return view('pages.home.detail-service', compact('jenis_layanan', 'layanan'));
    }

    public function detail_package(PaketLayanan $paket_layanan)
    {
        return view('pages.home.detail-package', compact('paket_layanan'));
    }
}