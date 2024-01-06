@extends('layouts.app')

@section('tittle', 'Detail Layanan')

@section('content')
    <div class="text-center hero-service">
        <img src="{{ $jenis_layanan->background }}" alt="Background">
        <h1 class="text-align-center">{{ $jenis_layanan->nama }}</h1>
        <p class="text-align-center lead my-4 col-lg-8">{{ $jenis_layanan->deskripsi }}</p>
        <a href="{{ url('/#contact') }}" class="btn btn-outline-light mt-5">Hubungi Kami</a>
    </div>

    <div class="container mt-5">
        <div class="row">
            <h2 class="text-center mb-5" style="color: #37517e;">Layanan Tersedia</h2>
            @foreach ($jenis_layanan->layanans as $item)
                <div class="col-md-4">
                    <div class="card shadow  p-4 mb-4">
                        <img src="{{ asset('assets/img/hero-img.png') }}" class="card-img-top" alt="Gambar Layanan">
                        <div class="card-body text-center detail-services">
                            <h4 class="card-title">{{ $item->nama }}</h4>
                            <hr>
                            <p class="card-text">{{ $item->deskripsi }}</p>
                            <p class="card-text small mt-3">Kategori: {{ $jenis_layanan->nama }}</p>
                            <a href="{{ url('/#contact') }}" class="btn btn-info text-white mt-4">Hubungi Kami</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

@endsection
