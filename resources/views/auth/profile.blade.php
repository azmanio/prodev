@extends('layouts.app')

@section('title', 'Profil')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center mt-5">
            <div class="col-lg-8 mt-5">
                <div class="card shadow my-2">
                    <div class="card-header text-center pt-3 pb-2" style="color: #37517e">
                        <h4>Detail Profil</h4>
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('updateProfile') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body text-center">
                            @if ($user->image_path)
                                <img src="/storage/{{ $user->image_path }}" alt="Foto" class="rounded-circle"
                                    style="height: 150px; width: 150px; object-fit: cover">
                            @else
                                <img src="{{ asset('assets/img/user.png') }}" alt="Foto" class="rounded-circle"
                                    style="height: 150px; width: 150px; object-fit: cover">
                            @endif
                            <div class="custom-file mt-3" id="img-profile" hidden>
                                <input type="file" name="image_path" class="custom-file-input border p-2"
                                    id="customFile">
                            </div>
                            <div class="container w-75 mt-3">
                                <table class="text-justify w-100 detail-pesanan">
                                    <tr>
                                        <th>Nama</th>
                                        <td>
                                            <input id="updateProfileNama" class="form-control" type="text"
                                                value="{{ old('nama') ?? $user->nama }}" name="nama" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Email</th>
                                        <td>
                                            <input id="updateProfileEmail" class="form-control" type="text"
                                                value="{{ old('email') ?? $user->email }}" name="email" readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Instansi</th>
                                        <td>
                                            <input id="updateProfileInstansi" class="form-control" type="text"
                                                value="{{ old('instansi') ?? $user->customer->instansi }}" name="instansi"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Jenis Kelamin</th>
                                        <td>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="laki-laki"
                                                    value="laki-laki" required disabled
                                                    {{ (old('gender') ?? $user->customer->gender) == 'laki-laki' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="gender" id="perempuan"
                                                    value="perempuan" required disabled
                                                    {{ (old('gender') ?? $user->customer->gender) == 'perempuan' ? 'checked' : '' }}>
                                                <label class="form-check-label" for="perempuan">Perempuan</label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Telepon</th>
                                        <td>
                                            <input id="updateProfileTelepon" class="form-control" type="text"
                                                value="{{ old('telepon') ?? $user->customer->telepon }}" name="telepon"
                                                readonly>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Alamat</th>
                                        <td>
                                            <textarea id="updateProfileAlamat" class="form-control" type="text" name="alamat" readonly>{{ old('alamat') ?? $user->customer->alamat }}
                                            </textarea>
                                        </td>
                                    </tr>
                                    <tr id="password" hidden>
                                        <th>
                                            Password
                                        </th>
                                        <td>
                                            <input type="password" name="password" class="form-control" id="password"
                                                value="" placeholder="Isi Jika Ingin Ganti Password">
                                        </td>
                                    </tr>
                                    <tr id="password-confirm" hidden>
                                        <th>
                                            Ketik Ulang Password
                                        </th>
                                        <td>
                                            <input type="password" name="password_confirmation" class="form-control"
                                                id="password-confirm" value=""
                                                placeholder="Isi Jika Ingin Ganti Password">
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <button type="button" class="btn btn-primary my-3" id="btnUpdateProfile">
                                Edit Profil
                            </button>
                            <button type="submit" class="btn btn-primary my-3" id="btnSubmitProfile" hidden>
                                Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
