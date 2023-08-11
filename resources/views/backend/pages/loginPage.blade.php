<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('assets/backend/css/vendor/bootstrap.min.css') }}">

    <title>Login</title>
</head>
<body>


    <div class="row">
        <div class="col-6 m-auto mt-6">

            <div class="card">

                <div class="card-body">

                    <form action="{{ route('admin.loginuser') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email </label>
                            <input type="email" class="form-control" id="email" name="email" >
                          </div>

                          <div class="mb-3">
                            <label for="password" class="form-label">password </label>
                            <input type="password" class="form-control" id="password" name="password" >
                          </div>

                          <button type="submit" class="btn btn-primary">Login</button>

                    </form>

                </div>

            </div>

        </div>
    </div>



</body>
</html>