@extends('layouts.admin')

@section('title', 'Paket Layanan')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Paket Layanan</h1>
            <a href="{{ route('paket-layanan.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Tambah Paket Layanan
            </a>
        </div>

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Background</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Layanan</th>
                            <th scope="col">Fitur</th>
                            <th scope="col" class="text-center">Status</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>
                                    @if ($item->background)
                                        <img src="/storage/{{ $item->background }}" alt="Background" style="height: 50px">
                                    @else
                                        <img src="{{ asset('assets/img/appdevelopment.jpg') }}" alt="Background"
                                            style="height: 50px">
                                    @endif
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td>{{ $item->layanan_options->map(function ($layanan) {
                                        return $layanan->layanan->nama;
                                    })->implode(', ') }}
                                </td>
                                <td>{{ $item->fitur }}</td>
                                <td class="text-center">
                                    <div class="custom-control custom-switch">
                                        <input onclick="window.location.href='{{ route('paket-layanan.status', $item) }}'"
                                            {{ $item->status ? 'checked' : '' }} type="checkbox"
                                            class="custom-control-input" id="customSwitch{{ $index }}">
                                        <label class="custom-control-label" for="customSwitch{{ $index }}">
                                            {{ $item->status ? 'Available' : 'Not Available Now' }}
                                        </label>
                                    </div>
                                </td>
                                <td>
                                    <div class="d-flex flex-column text-center">
                                        <a class="btn btn-primary mb-1" href="{{ route('paket-layanan.edit', $item) }}">
                                            Edit
                                        </a>
                                        <a class="btn btn-danger"
                                            onclick="deleteData('{{ route('paket-layanan.delete', $item) }}')">
                                            Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>

@endsection
