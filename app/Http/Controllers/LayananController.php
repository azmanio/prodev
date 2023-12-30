<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Layanan::all();
        return view("pages.admin.layanan.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis_layanan = JenisLayanan::all();
        return view("pages.admin.layanan.create", compact("jenis_layanan"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "jenis_layanan_id"=>"required|exists:jenis_layanans,id",
            "nama"=>"required|string",
            "deskripsi"=>"required|string"
        ]);

        Layanan::create($request->all());
        return redirect()->route("layanan.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Layanan $layanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Layanan $layanan)
    {
        $jenis_layanan = JenisLayanan::all();
        return view("pages.admin.layanan.update", compact("layanan","jenis_layanan"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            "jenis_layanan_id" => "required|exists:jenis_layanans,id",
            "nama" => "required|string",
            "deskripsi" => "required|string"
        ]);

        $layanan->update($request->all());
        return redirect()->route("layanan.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route("layanan.index");
    }

    public function status(Layanan $layanan)
    {
        $layanan->status = !$layanan->status;
        $layanan->save();
        return redirect()->route("layanan.index");
    }
}
