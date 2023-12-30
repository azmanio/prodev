@extends('layouts.admin')

@section('title', 'List Customer')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Customer</h1>
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
                                <th scope="col">Gender</th>
                                <th scope="col">Telepon</th>
                                <th scope="col">Alamat</th>
                                <th scope="col">Instansi</th>
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
                                    <td>{{ $item->customer->gender }}</td>
                                    <td>{{ $item->customer->telepon }}</td>
                                    <td>{{ $item->customer->alamat }}</td>
                                    <td>{{ $item->customer->instansi }}</td>
                                    <td class="text-center">
                                        <div class="custom-control custom-switch">
                                            <input onclick="window.location.href='{{ route('customer.status', $item) }}'"
                                                {{ $item->status ? 'checked' : '' }} type="checkbox"
                                                class="custom-control-input" id="customSwitch{{ $index }}">
                                            <label class="custom-control-label" for="customSwitch{{ $index }}">
                                                {{ $item->status ? 'Active' : 'Not Active' }}
                                            </label>
                                        </div>
                                    </td>
                                    <td class="d-flex flex-column text-center">
                                        <a class="btn btn-primary mb-1" href="{{ route('customer.edit', $item) }}">
                                            Edit
                                        </a>
                                        <a class="btn btn-danger"
                                            onclick="deleteData('{{ route('customer.delete', $item) }}')">
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
