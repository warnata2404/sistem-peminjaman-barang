<!DOCTYPE html>
<html>

<head>

    <title>Sistem Peminjaman Barang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container">

            <a class="navbar-brand" href="#">
                Sistem Peminjaman Barang
            </a>

            <form action="{{ route('logout') }}" method="POST">

                @csrf

                <button class="btn btn-danger btn-sm">
                    Logout
                </button>

            </form>

        </div>

    </nav>

    <div class="container mt-4">

        @yield('content')

    </div>

</body>

</html>
