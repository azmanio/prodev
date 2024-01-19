@extends('layouts.admin')

@section('title', 'Order')

@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">List Orderan</h1>
        </div>

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col" class="text-center">No</th>
                            <th scope="col" class="text-center">Invoice</th>
                            <th scope="col" class="text-center">Pilihan Layanan</th>
                            <th scope="col" class="text-center">Harga</th>
                            <th scope="col" class="text-center">Customer</th>
                            <th scope="col" class="text-center">Catatan</th>
                            <th scope="col" class="text-center">Payment Status</th>
                            <th scope="col" class="text-center">Payment Date</th>
                            <th scope="col" class="text-center">Project Status</th>
                            <th scope="col" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->no_invoice }}</td>
                                <td>
                                    {{ @$item->layanan->nama ?? @$item->paket_layanan->nama }}
                                </td>
                                <td>{{ $item->harga }}</td>
                                <td>{{ $item->user->nama }}</td>
                                <td>
                                    <div class="text-truncate d-inline-block" title="{{ $item->catatan }}"
                                        style="max-width: 200px">
                                        {!! $item->catatan ?? '-' !!}
                                    </div>
                                </td>
                                <td>{{ $item->payment_status }}</td>
                                <td>{{ $item->payment_date }}</td>
                                <td>{{ $item->project_status }}</td>
                                <td class="d-flex flex-column text-center">
                                    <a class="btn btn-primary mb-1" href="{{ route('order.edit', $item) }}">
                                        Edit
                                    </a>
                                    <a class="btn btn-danger" onclick="deleteData('{{ route('order.delete', $item) }}')">
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
