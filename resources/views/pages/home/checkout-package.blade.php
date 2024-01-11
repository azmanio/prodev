@extends('layouts.app')

@section('tittle', 'Checkout Paket')

@section('content')

    <div class="hero-service">
        <img src="/storage/{{ $paket_layanan->background }}" alt="Background">
        <div class="bg-opacity"></div>
        <div class="text-overlay mt-5">
            <h1>{{ $paket_layanan->nama }}</h1>
            <p class="mt-3">Kami menyediakan serangkaian paket layanan yang dirancang untuk memenuhi kebutuhan Anda. Setiap
                paket kami didukung oleh tim ahli yang siap memberikan solusi kreatif dan profesional.</p>
            <a href="{{ url('/#contact') }}" class="btn btn-outline-light mt-5">Hubungi Kami</a>
            <nav aria-label="breadcrumb" class="mt-5">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item breadcrumb-white">
                        <a href="/#home" class="text-white">
                            <u>Home</u>
                        </a>
                    </li>
                    <li class="breadcrumb-item breadcrumb-white">
                        <a href="/#package" class="text-white">
                            <u>Paket Layanan</u>
                        </a>
                    </li>
                    <li class="breadcrumb-item breadcrumb-white" aria-current="page">
                        {{ $paket_layanan->nama }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow mt-5">
                    <div class="card-body">
                        <h3 class="text-center" style="color: #37517e;">Deskripsi Paket Layanan</h3>
                        <div class="text-justify">
                            <p>{!! nl2br($paket_layanan->deskripsi) !!}</p>
                            <p>
                                Fitur yang akan didapatkan dalam paket ini diantaranya:
                            </p>
                            <p>{!! nl2br($paket_layanan->fitur) !!}</p>
                        </div>
                        <ul>
                            @foreach ($paket_layanan->layanan_options as $options)
                                <li><i class="bx bx-check"></i>{{ $options->layanan->nama }}</li>
                            @endforeach
                        </ul>
                        <h6 style="color: #37517e;">Catatan <small>(optional)</small></h6>
                        <textarea class="form-control mb-2" aria-label="With textarea"></textarea>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow mt-5">
                    <div class="card-header text-center pt-3 pb-2">
                        <h3 style="color: #37517e;">Detail Pesanan</h3>
                    </div>
                    <div class="card-body">
                        @auth
                            <table class="w-100 detail-pesanan">
                                <tr>
                                    <th>Nama</th>
                                    <td class="text-right">{{ auth()->user()->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Instansi</th>
                                    <td class="text-right">{{ auth()->user()->customer->instansi ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td class="text-right">{{ auth()->user()->email }}</td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td class="text-right">{{ auth()->user()->customer->telepon ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Pilihan Paket</th>
                                    <td class="text-right">{{ $paket_layanan->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Harga</th>
                                    <td class="text-right">Rp{{ $paket_layanan->harga }}</td>
                                </tr>
                            </table>
                        @endauth
                    </div>
                    <a href="" class="btn btn-primary rounded-none py-2">Pesan Sekarang</a>
                </div>
            </div>
        </div>
    </div>

@endsection
