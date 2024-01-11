@extends('layouts.admin')

@section('title', 'Tambah Layanan')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Layanan</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('layanan.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="jenis_layanan_id" class="form-label">Jenis Layanan</label>
                        <select name="jenis_layanan_id" id="jenis_layanan_id" class="form-control">
                            <option value="" selected disabled>--Pilih Jenis Layanan--</option>
                            @foreach ($jenis_layanan as $item)
                                <option value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga" required>
                    </div>
                    <div class="mb-3">
                        <label for="image_path">Gambar</label>
                        <div class="custom-file">
                            <input type="file" name="image_path" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

@endsection
