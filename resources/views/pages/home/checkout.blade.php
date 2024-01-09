@extends('layouts.app')

@section('tittle', 'Checkout Layanan')

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
                        <a href="{{ route('detail-service', $jenis_layanan) }}" class="text-white">
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
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow mt-5">
                    <div class="card-header p-3">
                        <h3>Detail Pesanan</h3>
                    </div>
                    <div class="card-body">
                        <form>
                            <div class="form-row d-flex flex-row justify-content-center">
                                <div class="form-group col-md-5">
                                    <label for="nama">Nama Lengkap</label>
                                    <input type="text" class="form-control" id="nama">
                                </div>
                                <div class="form-group col-md-5 ms-5">
                                    <label for="instansi">Instansi</label>
                                    <input type="text" class="form-control" id="instansi">
                                </div>
                            </div>
                            <div class="form-row d-flex flex-row justify-content-center mt-2">
                                <div class="form-group col-md-5">
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email">
                                </div>
                                <div class="form-group col-md-5 ms-5">
                                    <label for="telepon">Telepon</label>
                                    <input type="number" class="form-control" id="telepon">
                                </div>
                            </div>
                            <div class="form-row d-flex flex-row justify-content-center mt-2">
                                <div class="form-group col-md-5">
                                    <label for="layanan">Pilihan Layanan</label>
                                    <input type="text" class="form-control" id="layanan">
                                </div>
                                <div class="form-group col-md-5 ms-5">
                                    <label for="harga">Harga</label>
                                    <input type="number" class="form-control" id="harga">
                                </div>
                            </div>
                            <div class="container mt-4">
                                <h5>Deskripsi Layanan</h5>
                                <p>Ini bagian deskripsi layanan</p>
                            </div>
                            <div class="text-center my-3">
                                <button type="submit" class="btn btn-primary mt-4">Bayar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="card shadow mt-5">
                    <div class="card-header p-3">
                        <h3>Detail Pembayaran</h3>
                    </div>
                    <div class="card-body">

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
