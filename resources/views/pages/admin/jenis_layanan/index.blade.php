@extends('layouts.admin')

@section('title', 'Jenis Layanan')

@push('script')
    <script>
        function delete_confirm(url) {
            Swal.fire({
                title: "Apa Kamu Yakin?",
                text: "Data yang dihapus tidak dapat dikembalikan lagi",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes!"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url
                }
            });
        }
    </script>
@endpush

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
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Background</th>
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
                                <td>
                                    @if ($item->background)
                                        <img src="/storage/{{ $item->background }}" alt="Background" style="height: 50px">
                                    @else
                                        <img src="{{ asset('assets/img/appdevelopment.jpg') }}" alt="Background"
                                            style="height: 50px">
                                    @endif
                                </td>
                                <td>{{ $item->icon_class }}</td>
                                <td>{{ $item->nama }}</td>
                                <td>{{ $item->deskripsi }}</td>
                                <td class="d-flex flex-column text-center">
                                    <a class="btn btn-primary mb-1" href="{{ route('jenis-layanan.edit', $item) }}">
                                        Edit
                                    </a>
                                    <a class="btn btn-danger"
                                        onclick="delete_confirm('{{ route('jenis-layanan.delete', $item) }}')">
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
