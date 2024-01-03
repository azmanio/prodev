@extends('layouts.admin')

@section('title', 'Ubah Jenis Layanan')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Jenis Layanan</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('jenis-layanan.update', $jenis_layanan) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="icon_class" class="form-label">Icon</label>
                        <input type="text" name="icon_class" class="form-control" id="icon_class"
                            value="{{ $jenis_layanan->icon_class }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama"
                            value="{{ $jenis_layanan->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" name="deskripsi" class="form-control" id="deskripsi"
                            value="{{ $jenis_layanan->deskripsi }}" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
