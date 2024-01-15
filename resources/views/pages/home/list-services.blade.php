@extends('layouts.app')

@section('title', 'Layanan')

@section('content')

    <div class="hero-service">
        <img src="/storage/{{ $jenis_layanan->background }}" alt="Background">
        <div class="bg-opacity"></div>
        <div class="text-overlay mt-5">
            <h1>{{ $jenis_layanan->nama }}</h1>
            <p>{{ $jenis_layanan->deskripsi }}</p>
            <a href="{{ url('/#contact') }}" class="btn btn-outline-light mt-5">Hubungi Kami</a>
            <nav aria-label="breadcrumb" class="mt-5">
                <ol class="breadcrumb justify-content-center">
                    <li class="breadcrumb-item breadcrumb-white"><a href="/#home" class="text-white"><u>Home</u></a></li>
                    <li class="breadcrumb-item breadcrumb-white"><a href="/#services" class="text-white"><u>Layanan</u></a>
                    </li>
                    <li class="breadcrumb-item text-white active breadcrumb-white" aria-current="page">
                        {{ $jenis_layanan->nama }}
                    </li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container mt-5">
        <div class="row">
            <h2 class="text-center mb-5" style="color: #37517e;">Layanan Tersedia</h2>
            @foreach ($jenis_layanan->layanans as $item)
                <div class="col-md-4">
                    <div class="card shadow p-4 mb-4">
                        @if ($item->image_path)
                            <img src="/storage/{{ $item->image_path }}" class="card-img-top img-card" alt="Layanan">
                        @else
                            <img src="{{ asset('assets/img/hero-img.png') }}" class="card-img-top img-card" alt="Layanan">
                        @endif
                        <div class="card-body card-service">
                            <h4 class="card-title text-center">{{ $item->nama }}</h4>
                            <hr>
                            <div class="card-text overflow-hidden text-justify" style="max-height: 190px">
                                {!! $item->deskripsi !!}</div>
                            <p>...</p>
                            <p class="card-text" style="color: #37517e;">Harga: Rp{{ $item->harga }}</p>
                            <p class="card-text small">Kategori: {{ $jenis_layanan->nama }}</p>
                            <div class="text-center">
                                <a href="{{ route('detail-service', [$jenis_layanan, $item]) }}"
                                    class="btn btn-info text-white mt-4">
                                    Detail Layanan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
