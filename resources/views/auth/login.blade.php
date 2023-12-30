@extends('layouts.auth')

@section('tittle', 'Login')

@section('content')
    <div class="container-fluid">
        <!-- Outer Row -->
        <div class="row justify-content-center mt-5">
            <div class="col-xl-8 col-lg-8 col-md-6 mt-5">
                <div class="card o-hidden border-0 shadow-lg mt-3">
                    <div class="card-body">
                        <div class="col-lg-6 mx-auto py-3">

                            <h2 class="text-center text-gray-900 mb-4">Welcome Back!</h2>

                            @if ($errors->any())
                                <div class="alert alert-danger pb-0">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <form class="user" method="POST" action="{{ route('auth.loginStore') }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        aria-describedby="emailHelp" placeholder="Masukkan Alamat Email..." name="email"
                                        value="{{ old('email') }}" required>
                                </div>
                                <div class="form-group mb-3">
                                    <div class="input-group">
                                        <input type="password" class="form-control form-control-user" id="password"
                                            placeholder="Password" name="password" required>
                                        <div class="input-group-append">
                                            <button type="button" id="togglePassword"
                                                class="btn btn-outline-secondary rounded-right-only">
                                                <i class="fa fa-eye"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-4">
                                    <div class="custom-control custom-checkbox small">
                                        <input type="checkbox" class="custom-control-input" id="customCheck">
                                        <label class="custom-control-label" for="customCheck">Remember Me</label>
                                    </div>
                                </div>
                                <div class="form-group text-center">
                                    <button class="btn btn-primary btn-user btn-block mb-2" type="submit">
                                        Login
                                    </button>
                                </div>
                            </form>
                            <hr>
                            <div class="text-center small">
                                <a href="#">Forgot Password?</a><br><br>
                                <p>Belum memiliki akun? <a href="{{ route('auth.register') }}">Daftar Sekarang!</a></p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>
@endsection
