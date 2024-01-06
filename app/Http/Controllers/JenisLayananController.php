<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $data = $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'background' => 'required|image'
        ]);

        if (@$data['background']) {
            $ext = $request->file('background')->getClientOriginalExtension();
            // save to storage
            $data['background'] = $request->file('background')->storeAs('public/bg-jenis-layanan', time() . Str::slug($request->nama) . '.' . $ext);
            $data['background'] = str_replace('public/', '', $data['background']);
        }

        JenisLayanan::create($data);
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
        $data = $request->validate([
            'nama' => 'required|string',
            'deskripsi' => 'required|string',
            'background' => 'required|image'
        ]);

        if (@$data['background']) {
            $ext = $request->file('background')->getClientOriginalExtension();
            // save to storage
            $data['background'] = $request->file('background')->storeAs('public/bg-jenis-layanan', time() . Str::slug($request->nama) . '.' . $ext);
            $data['background'] = str_replace('public/', '', $data['background']);
        }

        $jenis_layanan->update($data);
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
