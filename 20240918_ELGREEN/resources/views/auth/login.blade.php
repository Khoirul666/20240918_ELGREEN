<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('image/elgreen.png')}}" />
    <title>LOG IN | ELGREEN</title>
    
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.0\css\bootstrap.min.css')}}">
</head>

<body class="bg-light">
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-5 shadow-sm">
                    <div class="card-body">
                        <h2 class="text-center">LOG IN</h2>
                        <form method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input name="username" type="username" class="form-control" id="username" placeholder="Enter Username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input name="password" type="password" class="form-control" id="password" placeholder="Password" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">LOG IN</button>
                        </form>
                        <div class="text-center mt-3">
                            <h6>New to this site? <a href="{{route('signup')}}">Sign Up</a></h6>
                            <a href="{{route('home')}}" class="btn btn-info w-100">Back to Home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('bootstrap-5.3.0\js\bootstrap.min.js')}}"></script>
</body>

</html>