@extends('layouts.admin')

@section('title', 'Ubah Order')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Order</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('order.update', $order) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="invoice" class="form-label">Invoice</label>
                        <input type="text" class="form-control" id="invoice"
                            value="{{ old('invoice') ?? $order->no_invoice }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="layanan_id" class="form-label">Layanan Tersedia</label>
                        <select name="layanan_id" id="layanan_id" class="form-control">
                            <option value="" disabled>--Layanan Tersedia--</option>
                            <option value="">-</option>
                            @foreach ($layanan as $item)
                                <option {{ $item->id == $order->layanan_id ? 'selected' : '' }} value="{{ $item->id }}">
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="paket_layanan_id" class="form-label">Paket Layanan Tersedia</label>
                        <select name="paket_layanan_id" id="paket_layanan_id" class="form-control">
                            <option value="" disabled>--Paket Layanan Tersedia--</option>
                            <option value="">-</option>
                            @foreach ($paket_layanan as $item)
                                <option {{ $item->id == $order->paket_layanan_id ? 'selected' : '' }}
                                    value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="text" class="form-control" id="harga"
                            value="Rp{{ old('harga') ?? $order->harga }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="customer" class="form-label">Customer</label>
                        <input type="text" class="form-control" id="customer"
                            value="{{ old('customer') ?? $order->user->nama }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="catatan" class="form-label">Catatan</label>
                        <textarea class="form-control" id="summernote" name="catatan" rows="5">{{ old('catatan') ?? $order->catatan }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="payment_status" class="form-label">Payment Status</label>
                        <input type="text" class="form-control" id="payment_status"
                            value="{{ old('payment_status') ?? $order->payment_status }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="payment_date" class="form-label">Payment Date</label>
                        <input type="text" class="form-control" id="payment_date"
                            value="{{ old('payment_date') ?? $order->payment_date }}" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="project_status" class="form-label">Project Status</label>
                        <select name="project_status" id="project_status" class="form-control" required>
                            <option value="" disabled>--Status--</option>
                            <option {{ $order->project_status == 'belum dimulai' ? 'selected' : '' }}
                                value="belum dimulai">
                                Belum Selesai</option>
                            <option {{ $order->project_status == 'proses' ? 'selected' : '' }} value="proses">
                                Proses</option>
                            <option {{ $order->project_status == 'selesai' ? 'selected' : '' }} value="selesai">
                                Selesai</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
