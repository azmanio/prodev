@extends('layouts.app')

@section('tittle', 'Register')

@section('content')
    <div class="container-fluid">
        <div class="row justify-content-center mt-5">
            <div class="col-xl-8 col-lg-8 col-md-6 mt-5">
                <div class="card o-hidden border-0 shadow-lg rounded">
                    <div class="card-body">
                        <h2 class="text-center p-3">Selamat Datang!</h2>

                        @if ($errors->any())
                            <div class="alert alert-danger pb-0">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <form method="POST" action="{{ route('auth.register') }}">
                            @csrf
                            <div class="form-group row mb-3 justify-content-center align-items-center">
                                <label for="nama" class="col-md-4 col-form-label text-md-right">Nama Lengkap *</label>
                                <div class="col-md-6">
                                    <input id="nama" type="text" class="form-control" name="nama" required
                                        autocomplete="nama" value="{{ old('nama') }}" autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-3 justify-content-center align-items-center">
                                <label for="email" class="col-md-4 col-form-label text-md-right">E-Mail *</label>
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control" name="email" required
                                        autocomplete="email" value="{{ old('email') }}" placeholder="example@gmail.com">
                                </div>
                            </div>

                            <div
                                class="form-group
                                        row mb-3 justify-content-center align-items-center">
                                <label for="password" class="col-md-4 col-form-label text-md-right">Password *</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password" type="password" class="form-control" name="password" required
                                            autocomplete="new-password">
                                        <div class="input-group-append">
                                            <button type="button" id="togglePassword"
                                                class="btn btn-outline-secondary rounded-right-only">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <small id="passwordHelpInline" class="text-muted">
                                        Minimal 8 karakter
                                    </small>
                                </div>
                            </div>

                            <div class="form-group row mb-3 justify-content-center align-items-center">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Ketik Ulang
                                    Password *</label>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <input id="password-confirm" type="password" class="form-control"
                                            name="password_confirmation" required autocomplete="new-password">
                                        <div class="input-group-append">
                                            <button type="button" id="togglePasswordConfirm"
                                                class="btn btn-outline-secondary rounded-right-only">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-2 justify-content-center align-items-center">
                                <label class="col-md-4 col-form-label text-md-right">Jenis Kelamin *</label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="laki-laki"
                                            value="laki-laki" required {{ old('gender') == 'laki-laki' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="gender" id="perempuan"
                                            value="perempuan" required {{ old('gender') == 'perempuan' ? 'checked' : '' }}>
                                        <label class="form-check-label" for="perempuan">Perempuan</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-3 justify-content-center align-items-center">
                                <label for="telepon" class="col-md-4 col-form-label text-md-right">No Handphone
                                    *</label>
                                <div class="col-md-6">
                                    <input id="telepon" type="text" class="form-control" name="telepon" required
                                        value="{{ old('telepon') }}">
                                </div>
                            </div>

                            <div class="form-group row mb-3 justify-content-center align-items-center">
                                <label for="alamat" class="col-md-4 col-form-label text-md-right">Alamat</label>
                                <div class="col-md-6">
                                    <textarea id="alamat" class="form-control" name="alamat">{{ old('alamat') }}</textarea>
                                </div>
                            </div>

                            <div class="form-group row mb-3 justify-content-center align-items-center">
                                <label for="instansi" class="col-md-4 col-form-label text-md-right">Instansi</label>
                                <div class="col-md-6">
                                    <input id="instansi" type="text" class="form-control" name="instansi"
                                        value="{{ old('instansi') }}">
                                </div>
                            </div>

                            <div class="form-group row my-4 justify-content-center align-items-center">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">Register</button>
                                </div>
                            </div>
                        </form>
                        <hr>
                        <div class="text-center small">
                            <p>Sudah Memiliki Akun? <a href="{{ route('auth.login') }}">Login Disini!</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
