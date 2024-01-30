@extends('layouts.admin')

@section('title', 'Ubah Paket Layanan')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Paket Layanan</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('paket-layanan.update', $paketLayanan) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="customFile">
                            Background
                            <small>(Ditampilkan di Halaman Detail)</small>
                        </label>
                        <div class="custom-file">
                            <input type="file" name="background" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="layanan_id" class="form-label">Layanan Tersedia</label>
                        <div name="layanan_id" id="layanan_id" class="border rounded pl-4 py-2">
                            <div class="row">
                                @foreach ($layanan as $index => $item)
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="checkbox"
                                            id="inlineCheckbox{{ $index }}" value="{{ $item->id }}"
                                            name="option[]"
                                            {{ in_array($item->id, $paketLayanan->layanan_options->pluck('layanan_id')->toArray()) ? 'checked' : '' }}>
                                        <label class="form-check-label pr-4"
                                            for="inlineCheckbox{{ $index }}">{{ $item->nama }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama"
                            value="{{ $paketLayanan->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="harga" class="form-label">Harga</label>
                        <input type="number" name="harga" class="form-control" id="harga"
                            value="{{ $paketLayanan->harga }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <textarea class="form-control" id="summernote" name="deskripsi" required>{{ old('deskripsi') ?? $paketLayanan->deskripsi }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="fitur" class="form-label">Fitur</label>
                        <textarea class="form-control" name="fitur" required>{{ old('fitur') ?? $paketLayanan->fitur }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
