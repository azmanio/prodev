@extends('layouts.admin')

@section('title', 'Ubah Customer')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Customer</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('customer.update', $customer) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label>
                            Foto Profil
                            <small>(optional)</small>
                        </label>
                        <div class="custom-file">
                            <input type="file" name="image_path" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile"></label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama"
                            value="{{ old('nama') ?? $customer->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ old('email') ?? $customer->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="gender" class="form-label">Jenis Kelamin</label>
                        <div class="col-md-6">
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="laki-laki"
                                    value="laki-laki" required
                                    {{ (old('gender') ?? $customer->customer->gender) == 'laki-laki' ? 'checked' : '' }}>
                                <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="perempuan"
                                    value="perempuan" required
                                    {{ (old('gender') ?? $customer->customer->gender) == 'perempuan' ? 'checked' : '' }}>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="telepon" class="form-label">Telepon</label>
                        <input type="text" name="telepon" class="form-control" id="telepon"
                            value="{{ old('telepon') ?? $customer->customer->telepon }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat"
                            value="{{ old('alamat') ?? $customer->customer->alamat }}">
                    </div>
                    <div class="mb-3">
                        <label for="instansi" class="form-label">Instansi</label>
                        <input type="text" name="instansi" class="form-control" id="instansi"
                            value="{{ old('instansi') ?? $customer->customer->instansi }}">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password <small>(Isi Jika Ingin Ganti
                                Password)</small></label>
                        <input type="password" name="password" class="form-control" id="password" value="">
                    </div>
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Ketik Ulang Password <small>(Isi Jika Ingin
                                Ganti Password)</small></label>
                        <input type="password" name="password_confirmation" class="form-control" id="password-confirm"
                            value="">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
