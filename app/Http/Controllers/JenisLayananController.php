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
        return view("pages.admin.jenis_layanan.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("pages.admin.jenis_layanan.create");
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

        JenisLayanan::create($request->all());
        return redirect()->route('jenis-layanan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(JenisLayanan $jenis_layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(JenisLayanan $jenis_layanan)
    {
        return view('pages.admin.jenis_layanan.update', compact('jenis_layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, JenisLayanan $jenis_layanan)
    {
        $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string'
        ]);

        $jenis_layanan->update($request->all());
        return redirect()->route('jenis-layanan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(JenisLayanan $jenis_layanan)
    {
        $jenis_layanan->delete();
        return redirect()->route('jenis-layanan.index');
    }
}
