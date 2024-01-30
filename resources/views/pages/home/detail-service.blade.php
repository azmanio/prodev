@extends('layouts.app')

@section('title', 'Detail Layanan')

@section('content')
    <div>
        <div class="hero-service">
            <img src="/storage/{{ $jenis_layanan->background }}" alt="Background">
            <div class="bg-opacity"></div>
            <div class="text-overlay mt-5">
                <h1>{{ $jenis_layanan->nama }}</h1>
                <p>{{ $jenis_layanan->deskripsi }}</p>
                <a href="{{ url('/#contact') }}" class="btn btn-outline-light mt-5">Hubungi Kami</a>
                <nav aria-label="breadcrumb" class="mt-5">
                    <ol class="breadcrumb justify-content-center">
                        <li class="breadcrumb-item breadcrumb-white">
                            <a href="/#home" class="text-white">
                                <u>Home</u>
                            </a>
                        </li>
                        <li class="breadcrumb-item breadcrumb-white">
                            <a href="/#services" class="text-white">
                                <u>Layanan</u>
                            </a>
                        </li>
                        <li class="breadcrumb-item text-white breadcrumb-white">
                            <a href="{{ route('services', $jenis_layanan) }}" class="text-white">
                                <u>{{ $jenis_layanan->nama }}</u>
                            </a>
                        </li>
                        <li class="breadcrumb-item breadcrumb-white" aria-current="page">
                            {{ $layanan->nama }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>

        <div class="container">
            <form action="{{ route('checkout') }}" method="POST">
                @csrf
                <input type="hidden" name="layanan_id" value="{{ $layanan->id }}">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row">
                    <div class="col-lg-8">
                        <div class="card shadow mt-5">
                            <div class="card-body">
                                <div class="text-center">
                                    <h3 class="mt-2 mb-4" style="color: #37517e;">{{ $layanan->nama }}</h3>
                                    @if ($layanan->image_path)
                                        <img src="/storage/{{ $layanan->image_path }}" class="card-img-top w-75"
                                            alt="Layanan">
                                    @else
                                        <img src="{{ asset('assets/img/hero-img.png') }}" class="card-img-top w-100 h-75"
                                            alt="Layanan">
                                    @endif
                                </div>
                                <h5 class="mt-4" style="color: #37517e;">Deskripsi Layanan</h5>
                                <p class="text-justify">{!! nl2br($layanan->deskripsi) !!}</p>
                                @auth
                                    <h6 style="color: #37517e;">Catatan <small>(optional)</small></h6>
                                    <textarea class="form-control mb-2" id="summernote" aria-label="With textarea">{{ old('catatan') }}</textarea>
                                @endauth
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
                                            <th>Pilihan Layanan</th>
                                            <td class="text-right">{{ $layanan->nama }}</td>
                                        </tr>
                                        <tr>
                                            <th>Harga</th>
                                            <td class="text-right">Rp{{ number_format($layanan->harga, 0, ',', '.') }}</td>
                                        </tr>
                                    </table>
                                </div>
                                <button type="submit" class="btn btn-primary rounded-none py-2">Pesan Sekarang</button>
                            @else
                                <a href="{{ route('auth.login', ['url' => url()->current()]) }}"
                                    class="btn btn-primary w-100 py-2">Login Untuk
                                    Pemesanan</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
