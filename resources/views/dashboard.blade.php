<!DOCTYPE html>
<html>

<head>
    <title>Dashboard</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">

        <div class="card">

            <div class="card-body">

                <h3>Dashboard</h3>

                <p>
                    Login berhasil.
                </p>

                <form action="{{ route('logout') }}" method="POST">

                    @csrf

                    <button type="submit" class="btn btn-danger">
                        Logout
                    </button>

                </form>

            </div>

        </div>

    </div>

</body>

</html>
