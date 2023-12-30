@extends('layouts.admin')

@section('title', 'Ubah Admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Ubah Admin</h1>
        </div>

        <div class="card">
            <div class="card-body">
                <form action="{{ route('admin.update', $user) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="customFile">
                            Foto Profil
                            <small>(optional)</small>
                        </label>
                        <div class="custom-file">
                            <input type="file" name="image_path" class="custom-file-input" id="customFile">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama"
                            value="{{ old('nama') ?? $user->nama }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email"
                            value="{{ old('email') ?? $user->email }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password <small>(Isi Jika Ingin Ganti
                                Password)</small></label>
                        <input type="password" name="password" class="form-control" id="password" value="">
                    </div>
                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">Ketik Ulang Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password-confirm">
                    </div>
                    <button type="submit" class="btn btn-primary">Ubah</button>
                </form>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
