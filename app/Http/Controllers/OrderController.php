<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\Order;
use App\Models\PaketLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.home.detail-service');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'layanan_id' => ['nullable', 'exists:layanans,id'],
            'paket_layanan_id' => ['nullable', 'exists:paket_layanans,id']
        ]);

        $harga = 0;

        $harga_layanan = Layanan::find($request->layanan_id);

        if ($harga_layanan) {
            $harga = $harga_layanan->harga;
        }

        $harga_paket_layanan = PaketLayanan::find($request->paket_layanan_id);

        if ($harga_paket_layanan) {
            $harga = $harga_paket_layanan->harga;
        }

        if ($harga == 0) {
            return back();
        }

        $secret_key = 'Basic ' . config('xendit.key_auth');
        $no_invoice = Str::random(10);

        $order = Order::create([
            'user_id' => auth()->user()->id,
            'paket_layanan_id' => $request->paket_layanan_id,
            'layanan_id' => $request->layanan_id,
            'no_invoice' => $no_invoice,
            'harga' => $harga,
            'catatan' => request('catatan'),
            'payment_status_xendit' => '',
            'payment_link' => ''
        ]);

        $data = Http::withHeaders([
            'Authorization' => $secret_key
        ])->post('https://api.xendit.co/v2/invoices', [
                    'external_id' => $no_invoice,
                    'amount' => $harga,
                    'success_redirect_url' => route('callback', $order),
                    'failure_redirect_url' => route('callback', $order)
                ]);

        $response = $data->object();

        $order->update([
            'payment_status_xendit' => $response->status,
            'payment_link' => $response->invoice_url
        ]);

        return redirect($response->invoice_url);
    }

    public function callback(Order $order)
    {
        $secret_key = 'Basic ' . config('xendit.key_auth');

        $data = Http::withHeaders([
            'Authorization' => $secret_key
        ])->get('https://api.xendit.co/v2/invoices/?external_id=' . $order->no_invoice);

        $response = $data->object();

        $status = $response[0]->status;

        if ($status == 'PAID' || $status == 'SETTLED') {
            $order->update([
                'payment_status' => 'sukses',
                'payment_date' => now(),
                'payment_status_xendit' => $status
            ]);
        }

        return response()->json($response);
    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order)
    {
        //
    }
}