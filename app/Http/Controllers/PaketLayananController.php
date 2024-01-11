<?php

namespace App\Http\Controllers;

use App\Models\PaketLayanan;
use App\Models\Layanan;
use App\Models\PaketOption;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PaketLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PaketLayanan::all()->load('layanan_options', 'layanan_options.layanan');
        return view("pages.admin.paket_layanan.index", compact("data"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $layanan = Layanan::where('status', 1)->get();
        return view("pages.admin.paket_layanan.create", compact("layanan"));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'fitur' => 'required|string',
            'option' => 'required|array',
            'background' => 'required|image'
        ]);

        if (@$request['background']) {
            $ext = $request->file('background')->getClientOriginalExtension();
            // save to storage
            $request['background'] = $request->file('background')->storeAs('public/bg-paket-layanan', time() . Str::slug($request->nama) . '.' . $ext);
            $request['background'] = str_replace('public/', '', $request['background']);
        }

        $paket_layanan = PaketLayanan::create($request->except(['option']));

        foreach ($request->option as $option) {
            PaketOption::create([
                'layanan_id' => $option,
                'paket_layanan_id' => $paket_layanan->id
            ]);
        }

        return redirect()->route('paket-layanan.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PaketLayanan $paketLayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PaketLayanan $paketLayanan)
    {
        $paketLayanan->load('layanan_options');
        $layanan = Layanan::all();
        return view('pages.admin.paket_layanan.update', compact('paketLayanan', 'layanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PaketLayanan $paketLayanan)
    {
        $request->validate([
            'nama' => 'required|string',
            'harga' => 'required|numeric',
            'deskripsi' => 'required|string',
            'fitur' => 'required|string',
            'option' => 'required|array',
            'background' => 'required|image'
        ]);

        $data_paket_layanan = $request->except(['option']);

        if (@$data_paket_layanan['background']) {
            $ext = $request->file('background')->getClientOriginalExtension();
            // save to storage
            $data_paket_layanan['background'] = $request->file('background')->storeAs('public/bg-paket-layanan', time() . Str::slug($request->nama) . '.' . $ext);
            $data_paket_layanan['background'] = str_replace('public/', '', $data_paket_layanan['background']);
        }

        $paketLayanan->update($data_paket_layanan);

        PaketOption::where('paket_layanan_id', $paketLayanan->id)->delete();

        foreach ($request->option as $option) {
            PaketOption::create([
                'layanan_id' => $option,
                'paket_layanan_id' => $paketLayanan->id
            ]);
        }

        return redirect()->route('paket-layanan.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PaketLayanan $paketLayanan)
    {
        $paketLayanan->delete();
        return redirect()->route('paket-layanan.index');
    }

    public function status(PaketLayanan $paketLayanan)
    {
        $paketLayanan->status = !$paketLayanan->status;
        $paketLayanan->save();
        return redirect()->route('paket-layanan.index');
    }
}
