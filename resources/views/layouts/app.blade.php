<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Sistem Peminjaman Barang')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm">

        <div class="container">

            <a class="navbar-brand fw-bold" href="{{ route('barang.index') }}">

                Sistem Peminjaman Barang

            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav me-auto">

                    <li class="nav-item">

                        <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}"
                            href="{{ route('dashboard') }}">

                            Dashboard

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link {{ request()->routeIs('barang.*') ? 'active' : '' }}"
                            href="{{ route('barang.index') }}">

                            Data Barang

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link {{ request()->routeIs('peminjam.*') ? 'active' : '' }}"
                            href="{{ route('peminjam.index') }}">

                            Data Peminjam

                        </a>

                    </li>

                    <li class="nav-item">

                        <a class="nav-link {{ request()->routeIs('peminjaman.*') ? 'active' : '' }}"
                            href="{{ route('peminjaman.index') }}">

                            Transaksi Peminjaman

                        </a>

                    </li>

                </ul>

                <div class="d-flex align-items-center">

                    <span class="text-white me-3">

                        Login sebagai :

                        <strong>

                            {{ Auth::user()->name }}

                        </strong>

                    </span>

                    <form action="{{ route('logout') }}" method="POST">

                        @csrf

                        <button type="submit" class="btn btn-danger btn-sm">

                            Logout

                        </button>

                    </form>

                </div>

            </div>

        </div>

    </nav>

    <main class="container py-4">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show">

                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert">
                </button>

            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show">

                {{ session('error') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert">
                </button>

            </div>
        @endif

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul class="mb-0">

                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach

                </ul>

            </div>

        @endif

        <div class="card shadow-sm">

            <div class="card-body">

                @yield('content')

            </div>

        </div>

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

    @stack('scripts')

</body>

</html>
