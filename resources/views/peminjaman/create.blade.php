@extends('layouts.app')

@section('title', 'Tambah Peminjaman')

@section('content')

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h3>Tambah Transaksi Peminjaman</h3>

        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary">

            Kembali

        </a>

    </div>

    @if ($errors->any())

        <div class="alert alert-danger">

            <strong>Terjadi kesalahan:</strong>

            <ul class="mb-0 mt-2">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>

    @endif

    <form action="{{ route('peminjaman.store') }}" method="POST">

        @csrf

        <div class="mb-3">

            <label class="form-label">

                Peminjam

            </label>

            <select name="peminjam_id" class="form-select" required>

                <option value="">
                    -- Pilih Peminjam --
                </option>

                @foreach ($peminjam as $item)
                    <option value="{{ $item->id }}" {{ old('peminjam_id') == $item->id ? 'selected' : '' }}>

                        {{ $item->nama_peminjam }}

                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">

                Barang

            </label>

            <select name="barang_id" class="form-select" required>

                <option value="">
                    -- Pilih Barang --
                </option>

                @foreach ($barang as $item)
                    <option value="{{ $item->id }}" {{ old('barang_id') == $item->id ? 'selected' : '' }}>

                        {{ $item->kode_barang }}
                        -
                        {{ $item->nama_barang }}
                        (Stok: {{ $item->stok }})
                    </option>
                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">

                Jumlah Pinjam

            </label>

            <input type="number" name="qty" class="form-control" value="{{ old('qty') }}" min="1" required>

        </div>

        <div class="d-flex gap-2">

            <button type="submit" class="btn btn-success">

                Simpan Transaksi

            </button>

            <button type="reset" class="btn btn-warning">

                Reset

            </button>

        </div>

    </form>

@endsection
