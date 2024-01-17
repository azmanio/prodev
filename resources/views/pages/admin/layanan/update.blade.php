@extends('layouts.admin')

@section('title', 'Ubah Layanan')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Layanan</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('layanan.update', $layanan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="jenis_layanan_id" class="form-label">Jenis Layanan</label>
                        <select name="jenis_layanan_id" id="jenis_layanan_id" class="form-control">
                            <option value="" disabled>Jenis Layanan Tersedia</option>
                            @foreach ($jenis_layanan as $item)
                                <option {{ $item->id == $layanan->jenis_layanan_id ? 'selected' : '' }}
                                    value="{{ $item->id }}">{{ $item->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama"
                            value="{{ old('nama') ?? $layanan->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="summernote" name="deskripsi" rows="5" required>{{ old('deskripsi') ?? $layanan->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga"
                            value="{{ old('harga') ?? $layanan->harga }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="customFile">Gambar</label>
                        <div class="custom-file">
                            <input type="file" name="image_path" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
