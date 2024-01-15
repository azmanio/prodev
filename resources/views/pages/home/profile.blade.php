@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8 mt-5">
                <div class="card shadow mt-2">
                    <div class="card-body text-center">
                        @if ($user->image_path)
                            <img src="/storage/{{ $user->image_path }}" alt="Foto" class="rounded-circle"
                                style="height: 150px; width: 150px; object-fit: cover">
                        @else
                            <img src="{{ asset('assets/img/user.png') }}" alt="Foto" class="rounded-circle"
                                style="height: 150px; width: 150px; object-fit: cover">
                        @endif
                        <div class="container w-75 mt-4">
                            <table class="text-justify w-100 detail-pesanan">
                                <tr>
                                    <th>Nama</th>
                                    <td class="text-right">{{ $user->nama }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th>
                                    <td class="text-right">{{ $user->email }}</td>
                                </tr>
                                <tr>
                                    <th>Instansi</th>
                                    <td class="text-right">{{ $user->customer->instansi ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Jenis Kelamin</th>
                                    <td class="text-right">{{ ucwords($user->customer->gender ?? '-') }}
                                    </td>
                                </tr>
                                <tr>
                                    <th>Telepon</th>
                                    <td class="text-right">{{ $user->customer->telepon ?? '-' }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td class="text-right">{{ $user->customer->alamat ?? '-' }}</td>
                                </tr>
                            </table>
                        </div>
                        <button type="submit" class="btn btn-primary mt-5" data-toggle="modal"
                            data-target="#editProfile">Edit Profil</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Profile Modal -->
    <div class="modal fade" id="editProfile" tabindex="-1" role="dialog" aria-labelledby="editProfileLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProfileLabel"><i class="fas fa-user-edit"></i> Edit Profil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="inputName">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ $user->nama }}" required>
                        </div>
                        <div class="form-group">
                            <label for="inputUsername">Username</label>
                            <input type="text" class="form-control" id="username" name="username"
                                value="{{ $user->username }}" required>
                        </div>
                        <div class="form-group">
                            <label for="inputEmail">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                value="{{ $user->email }}" required>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword">Password</label>
                            <input type="password" class="form-control" id="password" name="password"
                                placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="inputConfirmPassword">Konfirmasi Password</label>
                            <input type="password" class="form-control" id="password-confirm" name="password_confirmation"
                                placeholder="Konfirmasi Password">
                        </div>
                        <div class="form-group">
                            <label for="inputProfilePicture">Foto Profil</label>
                            <input type="file" name="image_path">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
