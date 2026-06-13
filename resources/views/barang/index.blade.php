@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between mb-3">

        <h3>Data Barang</h3>

        <a href="{{ route('barang.create') }}" class="btn btn-primary">
            Tambah Barang
        </a>

    </div>

    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <table class="table table-bordered table-striped">

        <thead>

            <tr>
                <th>No</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th width="180">Aksi</th>
            </tr>

        </thead>

        <tbody>

            @forelse($barang as $item)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $item->kode_barang }}</td>

                    <td>{{ $item->nama_barang }}</td>

                    <td>{{ $item->stok }}</td>

                    <td>

                        <a href="{{ route('barang.edit', $item->id) }}" class="btn btn-warning btn-sm">

                            Edit

                        </a>

                        <form action="{{ route('barang.destroy', $item->id) }}" method="POST" style="display:inline">

                            @csrf
                            @method('DELETE')

                            <button onclick="return confirm('Yakin hapus data ini?')" class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">

                        Tidak ada data

                    </td>

                </tr>
            @endforelse

        </tbody>

    </table>
@endsection
