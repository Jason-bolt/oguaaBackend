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
        <div>
            <div class="font-medium text-red-600">
                Whoops! Something went wrong.
            </div>

            <ul class="mt-3 text-sm text-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <!--
    <div class="alert alert-danger" role="alert">
        <ul>

            <li></li>

        </ul>
    </div> -->

    <form class="align-items-center" action="#" method="POST">
        <h2>Register</h2>
        <div class="fd col-auto ">
            <input class="form-controls " type="text" name="Firstname" id="Firstname" placeholder="Firstname">
        </div>
        <div class="fd col-auto ">
            <input class="form-controls " type="text" name="Lastname" id="Lastname" placeholder="Lastname">
        </div>
        <div class="fd col-auto ">
            <input class="form-controls " type="text" name="Username" id="username" placeholder="Username">
        </div>
        <div class="fd col-auto ">
            <input class="form-controls" type="password" name="password" id="password" placeholder="password">
        </div>
        <div class="fd col-auto ">

            <input class="btn btn-success border border-2" type="submit" value="Register">
        </div>
    </form>
</div>


</body>

</html>
