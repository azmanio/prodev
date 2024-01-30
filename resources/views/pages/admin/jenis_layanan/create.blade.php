@extends('layouts.admin')

@section('title', 'Tambah Jenis Layanan')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tambah Jenis Layanan</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('jenis-layanan.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="background">Background <small>(Ditampilkan di Halaman Detail)</small></label>
                        <div class="custom-file">
                            <input type="file" name="background" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="icon_class" class="form-label">Icon</label>
                        <input type="text" name="icon_class" class="form-control" id="icon_class"
                            value="{{ old('icon_class') }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ old('nama') }}"
                            required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="summernote" name="deskripsi" required>{{ old('deskripsi') }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div>

@endsection
