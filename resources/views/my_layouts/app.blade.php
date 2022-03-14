<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>OGUAA HALL</title>

    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.2-dist/css/bootstrap.css') }}">
    <script src="{{ asset(('bootstrap-5.0.2-dist/js/bootstrap.js')) }}"></script>

    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css"
        integrity="sha384-7ynz3n3tAGNUYFZD3cWe5PDcE36xj85vyFkawcF6tIwxvIecqKvfwLiaFdizhPpN"
        crossorigin="anonymous"
    />
    <link rel="icon" href={{ asset('oguaa-logo.jpg') }} />

    <style type="text/css">
        .image-upload {
            height: 120px;
            width: 120px;
            text-align: center;
            margin: auto;
            display: block;
            margin-top: 20px;
        }

        .card-img-top {
            height: 100%;
            width: 100%;
            border-radius: 100%;
        }
    </style>
</head>
<body>
<header class="header">
    <nav class="navbar navbar-expand-lg bg-light navbar-light shadow">
        <div class="container">
            <a href="{{ route('occupants') }}" class="navbar-brand">
                <img
                    src="{{ asset('oguaa-logo.jpg') }}"
                    alt="OGUAA LOGO"
                    width="50"
                    class="d-inline-block align-text-center"
                />
                <span style="color: rgb(4, 138, 26)"
                ><strong>OGUAA HALL</strong></span
                >
            </a>
            <button
                class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navMenu"
            >
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navMenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="{{ route('occupants') }}" class="nav-link {{ $page == 'occupants' ? 'active' : '' }}">Residents</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('data_collection') }}" class="nav-link {{ $page == 'data' ? 'active' : '' }}"
                        >Data Collection</a>
                    </li>
                    @if (\Illuminate\Support\Facades\Auth::user()->is_admin)
                        <li class="nav-item">
                            <a href="{{ route('users') }}" class="nav-link {{ $page == 'users' ? 'active' : '' }}">Users</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button
                                class="btn text-white"
                                style="background-color: rgb(4, 138, 26)"
                            >
                                Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>

@yield('content')

<!-- Footer -->
<footer
    class="footer p-5 text-white text-center position-relative"
    style="background-color: rgb(4, 138, 26)"
>
    <div class="container">
        <p class="lead">Copyright OGUAA HALL UCC &copy; 2022</p>
        <a href="#" class="position-absolute bottom-0 end-0 p-5 text-white">
            <i class="bi bi-arrow-up-circle h1"></i>
        </a>
    </div>
</footer>
</body>
</html>
