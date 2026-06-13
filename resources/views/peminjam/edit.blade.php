@extends('layouts.app')

@section('content')

    <h3>Edit Peminjam</h3>

    @if ($errors->any())
        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach

            </ul>

        </div>
    @endif

    <form action="{{ route('peminjam.update', $peminjam->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">

                Nama Peminjam

            </label>

            <input type="text" name="nama_peminjam" class="form-control"
                value="{{ old('nama_peminjam', $peminjam->nama_peminjam) }}">

        </div>

        <div class="mb-3">

            <label class="form-label">

                No HP

            </label>

            <input type="text" name="no_hp" class="form-control" value="{{ old('no_hp', $peminjam->no_hp) }}">

        </div>

        <div class="mb-3">

            <label class="form-label">

                Alamat

            </label>

            <textarea name="alamat" class="form-control" rows="4">{{ old('alamat', $peminjam->alamat) }}</textarea>

        </div>

        <button type="submit" class="btn btn-primary">

            Update

        </button>

        <a href="{{ route('peminjam.index') }}" class="btn btn-secondary">

            Kembali

        </a>

    </form>

@endsection
