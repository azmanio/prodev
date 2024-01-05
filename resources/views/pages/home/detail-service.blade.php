@extends('layouts.app')

@section('tittle', 'Detail Layanan')

@section('content')
    <div class="text-center hero-service">
        <h1 class="text-align-center">{{ $jenis_layanan->nama }}</h1>
        <p class="text-align-center lead my-4 col-lg-8">{{ $jenis_layanan->deskripsi }}</p>
        <a href="{{ url('/#contact') }}" class="btn btn-outline-light mt-5">Hubungi Kami</a>
    </div>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8">
                <h1>Layanan Tersedia</h1>
                <p>
                    Ini adalah deskripsi detail dari Layanan 1. Anda dapat menambahkan informasi lebih lanjut
                    tentang
                    layanan ini di sini.
                </p>
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vel tristique dolor. Nullam
                    venenatis
                    efficitur est, eu egestas nisl tristique eu. Morbi rhoncus, risus et elementum cursus, purus
                    augue
                    malesuada mi, eu vehicula ex nisi in ex.
                </p>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <img src="gambar_layanan.jpg" class="card-img-top" alt="Gambar Layanan">
                    <div class="card-body">
                        <h5 class="card-title">Layanan 1</h5>
                        <p class="card-text">Deskripsi singkat tentang Layanan 1.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
