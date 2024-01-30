@extends('layouts.admin')

@section('title', 'Layanan')

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
            <h1 class="h3 mb-0 text-gray-800">Layanan</h1>
            <a href="{{ route('layanan.create') }}" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm">
                <i class="fas fa-plus fa-sm text-white-50"></i>
                Tambah Layanan
            </a>
        </div>

        <div class="card">
            <div class="card-body table-responsive">
                <table class="table" id="dataTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Gambar</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Jenis Layanan</th>
                            <th scope="col">Harga</th>
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
                                        <img src="{{ asset('assets/img/hero-img.png') }}" alt="Foto"
                                            style="height: 50px">
                                    @endif
                                </td>
                                <td>{{ $item->nama }}</td>
                                <td>
                                    <div class="text-truncate d-inline-block" title="{{ $item->deskripsi }}"
                                        style="max-width: 200px; max-height: 100px">
                                        {!! $item->deskripsi !!}
                                    </div>
                                </td>
                                <td>{{ $item->jenis_layanan ? $item->jenis_layanan->nama : '-' }}</td>
                                <td>Rp{{ number_format($item->harga, 0, ',', '.') }}</td>
                                <td class="text-center">
                                    <div class="custom-control custom-switch">
                                        <input onclick="window.location.href='{{ route('layanan.status', $item) }}'"
                                            {{ $item->status ? 'checked' : '' }} type="checkbox"
                                            class="custom-control-input" id="customSwitch{{ $index }}">
                                        <label class="custom-control-label" for="customSwitch{{ $index }}">
                                            {{ $item->status ? 'Available' : 'Not Available Now' }}
                                        </label>
                                    </div>
                                </td>
                                <td class="d-flex flex-column text-center">
                                    <a class="btn btn-primary mb-1" href="{{ route('layanan.edit', $item) }}">
                                        Edit
                                    </a>
                                    <a class="btn btn-danger"
                                        onclick="delete_confirm('{{ route('layanan.delete', $item) }}')">
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
