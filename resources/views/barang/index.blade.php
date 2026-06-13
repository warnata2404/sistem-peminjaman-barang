@extends('layouts.app')

@section('content')
    <h3>Data Barang</h3>

    <a href="{{ route('barang.create') }}" class="btn btn-primary mb-3">
        Tambah Barang
    </a>

    @if (session('success'))
        <div class="alert alert-success">

            {{ session('success') }}

        </div>
    @endif

    <table class="table table-bordered">

        <thead>

            <tr>

                <th>Kode</th>
                <th>Nama Barang</th>
                <th>Stok</th>
                <th width="180">Aksi</th>

            </tr>

        </thead>

        <tbody>

            @foreach ($barang as $item)
                <tr>

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

                            <button onclick="return confirm('Hapus data?')" class="btn btn-danger btn-sm">

                                Hapus

                            </button>

                        </form>

                    </td>

                </tr>
            @endforeach

        </tbody>

    </table>
@endsection
