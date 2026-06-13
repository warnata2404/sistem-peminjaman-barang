@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h3>Dashboard</h3>

    <div class="row">

        <div class="col-md-4">

            <div class="card border-primary">

                <div class="card-body">

                    <h5>Total Barang</h5>

                    <h2>{{ \App\Models\Barang::count() }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-success">

                <div class="card-body">

                    <h5>Total Peminjam</h5>

                    <h2>{{ \App\Models\Peminjam::count() }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-4">

            <div class="card border-warning">

                <div class="card-body">

                    <h5>Total Transaksi</h5>

                    <h2>{{ \App\Models\Peminjaman::count() }}</h2>

                </div>

            </div>

        </div>

    </div>

@endsection
