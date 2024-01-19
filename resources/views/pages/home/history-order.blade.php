@extends('layouts.app')

@section('title', 'Riwayat Pesanan')

@push('script')
    <script>
        function delete_order(url) {
            Swal.fire({
                title: "Apa Kamu Yakin?",
                text: "Anda Harus Melakukan Transaksi Lagi Jika Ingin Memesan.",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url
                }
            });
        }
    </script>
    <script>
        $("#select_layanan").on("change", function() {
            window.location.href = '?layanan=' + $('#select_layanan').val()
        });
    </script>
    <script>
        $("#select_paket_layanan").on("change", function() {
            window.location.href = '?paket_layanan=' + $('#select_paket_layanan').val()
        });
    </script>
@endpush

@section('content')
    <div class="container pt-5">
        <div class=" text-center pt-3 mt-5 mb-4">
            <h3 style="color: #37517e">Riwayat Pesanan</h3>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="card-body rounded shadow p-4">
                    <h4 class="mb-4 text-center" style="color: #37517e">Filter Pesanan</h4>
                    <div>
                        <label for="layanan">Layanan</label>
                        <select class="form-control form-select" id="select_layanan">
                            <option value="" {{ request('layanan') == '' ? 'selected' : '' }}>Semua Layanan
                            </option>
                            @foreach ($layanan as $item)
                                <option {{ request('layanan') == $item->id ? 'selected' : '' }} value="{{ $item->id }}">
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mt-3">
                        <label for="paket_layanan">Paket Layanan</label>
                        <select class="form-control form-select" id="select_paket_layanan">
                            <option value="" {{ request('paket_layanan') === null ? 'selected' : '' }}>Semua Paket
                                Layanan</option>
                            @foreach ($paket_layanan as $item)
                                <option {{ request('paket_layanan') == $item->id ? 'selected' : '' }}
                                    value="{{ $item->id }}">
                                    {{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="filter-btn mt-3">
                        <p class="mb-0" for="project_status">Project Status</p>
                        <a href="?project_status="
                            class="btn btn-outline-info mb-2 @if (request()->project_status == '') active text-white @endif">Semua</a>
                        <a href="?project_status=selesai"
                            class="btn btn-outline-info mb-2 @if (request()->project_status == 'selesai') active text-white @endif">Selesai</a>
                        <a href="?project_status=proses"
                            class="btn btn-outline-info mb-2 @if (request()->project_status == 'proses') active text-white @endif">Proses</a>
                        <a href="?project_status=belum dimulai"
                            class="btn btn-outline-info mb-2 @if (request()->project_status == 'belum dimulai') active text-white @endif">Belum
                            Dimulai</a>
                    </div>
                    <div class="filter-btn mt-2">
                        <p class="mb-0" for="project_status">Status Pembayaran</p>
                        <a href="?payment_status="
                            class="btn btn-outline-info mb-2 @if (request()->query('payment_status') === null) active text-white @endif">Semua</a>
                        <a href="?payment_status=sukses"
                            class="btn btn-outline-info mb-2 @if (request()->query('payment_status') === 'sukses') active text-white @endif">Sukses</a>
                        <a href="?payment_status=pending"
                            class="btn btn-outline-info mb-2 @if (request()->query('payment_status') === 'pending') active text-white @endif">Pending</a>
                        <a href="?payment_status=gagal"
                            class="btn btn-outline-info mb-2 @if (request()->query('payment_status') === 'gagal') active text-white @endif ">Gagal</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                @if (count($orders) > 0)
                    @foreach ($orders as $order)
                        <div class="card-body shadow rounded py-3 px-4 mb-4">
                            <div class="row">
                                <div class="col">
                                    <h6>No Invoice : {{ $order->no_invoice }}</h6>
                                    <a
                                        href="@if (@$order->layanan) {{ url('/layanan/' . @$order->layanan->jenis_layanan->id . '/detail/' . @$order->layanan->id) }}
                                    @elseif (@$order->paket_layanan)
                                    {{ url('/paket-layanan/' . @$order->paket_layanan->id . '/detail') }} @endif">
                                        <h4>{{ @$order->layanan->nama ?? @$order->paket_layanan->nama }}</h4>
                                    </a>
                                    <h6>Project Status : {{ ucwords($order->project_status) }}</h6>
                                    <p class="mt-3 mb-0">Catatan :</p>
                                    <p>{!! $order->catatan ?? '-' !!}</p>
                                </div>
                                <div class="col text-end">
                                    <h6 class="mt-4 mb-3">Harga : Rp{{ number_format($order->harga, 0, ',', '.') }}</h6>
                                    <span
                                        class="@if ($order->payment_status == 'sukses') bg-warning @elseif ($order->payment_status == 'pending') bg-secondary @else bg-danger @endif p-2 rounded text-white my-5">{{ ucwords($order->payment_status) }}</span>
                                    <p class="mt-3 mb-0">Tanggal Pembayaran :</p>
                                    <p>{{ $order->payment_date ?? '-' }}</p>
                                    @if ($order->payment_status == 'pending')
                                        <a href="{{ route('checkout.payment', $order) }}" class="btn btn-primary">Bayar</a>
                                        <button class="btn btn-danger"
                                            onclick="delete_order('{{ route('cancel', $order) }}')">Batal</button>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center mt-5">
                        <h6>Tidak ada data transaksi pemesanan.</h6>
                    </div>
                @endif
            </div>
        </div>
    </div>
@endsection
