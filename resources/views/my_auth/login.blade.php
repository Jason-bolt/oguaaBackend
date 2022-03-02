<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.0/dist/css/bootstrap.min.css') }}">
    <link rel="icon" href="{{ asset('oguaa-logo.jpg') }}">
    <title>SignIn</title>
</head>

<body>
<div class="container2">

    @if ($errors->any())
        <div class="alert alert-danger" role="alert">
            <div class="p-2">
                <div class="font-medium text-red-600">
                    Whoops! Something went wrong.
                </div>

                <ul class="mt-3 text-sm text-danger">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif
    <!--
<div class="alert alert-danger" role="alert">
    <ul>

        <li></li>

    </ul>
</div> -->

    <form class="align-items-center" action="{{ route('login') }}" method="POST">
        @csrf
        <h2>login</h2>
        <div class="fd col-auto">
            <input
                class="form-controls"
                type="text"
                name="username"
                id="username"
                placeholder="Username"
                required
            />
        </div>
        <div class="fd col-auto">
            <input
                class="form-controls"
                type="password"
                name="password"
                id="password"
                placeholder="password"
                required
            />
        </div>
        <div class="fd col-auto w-90">
            <input
                class="btn btn-success border border-2"
                type="submit"
                value=" Sign In"
            />
        </div>
        <a
            style="
						text-decoration: none;
						color: yellow;
						font-size: larger;
						font-weight: bold;
					"
            href="{{ route('register') }}"
        >Register here</a
        >
    </form>
</div>
</body>
</html>
