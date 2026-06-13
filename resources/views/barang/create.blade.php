@extends('layouts.app')

@section('content')

    <h3>Tambah Barang</h3>

    @if ($errors->any())
        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label>Kode Barang</label>

            <input type="text" name="kode_barang" class="form-control" value="{{ old('kode_barang') }}">

        </div>

        <div class="mb-3">

            <label>Nama Barang</label>

            <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang') }}">

        </div>

        <div class="mb-3">

            <label>Stok</label>

            <input type="number" name="stok" class="form-control" value="{{ old('stok') }}">

        </div>

        <button class="btn btn-success">

            Simpan

        </button>

        <a href="{{ route('barang.index') }}" class="btn btn-secondary">

            Kembali

        </a>

    </form>

@endsection
