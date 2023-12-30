@extends('layouts.admin')

@section('title', 'List Admin')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Admin</h1>
            <a href="{{ route('admin.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-user-plus fa-sm text-white-50"></i>
                Tambah Admin
            </a>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table" id="dataTable">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Foto</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Email</th>
                                <th scope="col" class="text-center">Status</th>
                                <th scope="col" class="text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        @if ($item->image_path)
                                            <img src="/storage/{{ $item->image_path }}" alt="Foto" style="height: 50px">
                                        @else
                                            <img src="{{ asset('assets/img/user.png') }}" alt="Foto"
                                                style="height: 50px">
                                        @endif
                                    </td>
                                    <td>{{ $item->nama }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td class="text-center">
                                        <div class="custom-control custom-switch">
                                            <input onclick="window.location.href='{{ route('admin.status', $item) }}'"
                                                {{ $item->status ? 'checked' : '' }} type="checkbox"
                                                class="custom-control-input" id="customSwitch{{ $index }}">
                                            <label class="custom-control-label" for="customSwitch{{ $index }}">
                                                {{ $item->status ? 'Active' : 'Not Active' }}
                                            </label>
                                        </div>
                                    </td>
                                    <td class="d-flex flex-column text-center d-md-block">
                                        <a class="btn btn-primary mb-1 mb-md-0" href="{{ route('admin.edit', $item) }}">
                                            Edit
                                        </a>
                                        <a class="btn btn-danger"
                                            onclick="deleteData('{{ route('admin.delete', $item) }}')">
                                            Hapus
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

@endsection
