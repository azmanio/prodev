@extends('layouts.admin')

@section('title', 'Jenis Layanan')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Jenis Layanan</h1>
            <a href="{{ route('jenis-layanan.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Tambah Jenis Layanan
            </a>
        </div>

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->icon_class }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td class="d-flex flex-column text-center">
                                    <a class="btn btn-primary mb-1" href="{{ route('jenis-layanan.edit', $item) }}">
                                        Edit
                                    </a>
                                    <a class="btn btn-danger"
                                        onclick="deleteData('{{ route('jenis-layanan.delete', $item) }}')">
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

@endsection