<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Sistem Peminjaman Barang')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">

            <a class="navbar-brand" href="{{ route('barang.index') }}">
                Sistem Peminjaman Barang
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">

                <span class="navbar-toggler-icon"></span>

            </button>

            <div class="collapse navbar-collapse" id="navbarNav">

                <ul class="navbar-nav me-auto">

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

                    @if (Route::has('peminjaman.index'))
                        <li class="nav-item">

                            <a class="nav-link {{ request()->routeIs('peminjaman.*') ? 'active' : '' }}"
                                href="{{ route('peminjaman.index') }}">

                                Transaksi Peminjaman

                            </a>

                        </li>
                    @endif

                </ul>

                <div class="d-flex align-items-center">

                    <span class="text-white me-3">

                        Login sebagai:
                        <strong>{{ Auth::user()->name ?? 'Administrator' }}</strong>

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

    <main class="container mt-4">

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">

                {{ session('success') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">

                {{ session('error') }}

                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>

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

        @yield('content')

    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
