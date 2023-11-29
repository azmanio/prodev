<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use Illuminate\Http\Request;

class JenisLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = JenisLayanan::all();
        return view("jenis_layanan.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("jenis_layanan.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string'
        ]);

        $jenis_layanan = new JenisLayanan();
        $jenis_layanan -> nama = $request->nama;
        $jenis_layanan -> deskripsi = $request -> deskripsi;

        $jenis_layanan->save();

        return response()->redirectTo('/jenis_layanan');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisLayanan $jenisLayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisLayanan $jenisLayanan)
    {
        return view('jenis_layanan.update', compact('jenis_layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisLayanan $jenisLayanan)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string'
        ]);

        $jenisLayanan -> nama = $request->nama;
        $jenisLayanan -> deskripsi = $request->deskripsi;

        $jenisLayanan -> save();

        return response()->redirectTo('/jenis_layanan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisLayanan $jenisLayanan)
    {
        $jenisLayanan->delete();
        return response()->redirectTo('/jenis_layanan');
    }
}
