<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('bootstrap-5.0.0/dist/css/bootstrap.min.css') }}">
    <link rel="icon" href="{{ asset('oguaa-logo.jpg') }}">
    <title>Register</title>
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

    <form class="align-items-center" action="{{ route('register') }}" method="POST">
        @csrf
        <h2>Register</h2>
        <div class="fd col-auto ">
            <input class="form-controls " type="text" name="first_name" id="first_name" placeholder="First name" required>
        </div>
        <div class="fd col-auto ">
            <input class="form-controls " type="text" name="last_name" id="last_name" placeholder="Last name" required>
        </div>
        <div class="fd col-auto ">
            <input class="form-controls " type="text" name="username" id="username" placeholder="username" required>
        </div>
        <div class="fd col-auto ">
            <input class="form-controls" type="password" name="password" id="password" placeholder="password" required>
        </div>
        <div class="fd col-auto ">
            <input class="form-controls" type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm password" required>
        </div>
        <div class="fd col-auto ">
            <button class="btn btn-success border border-2 px-5" type="submit">Register</button>
        </div>
    </form>
</div>


</body>

</html>
