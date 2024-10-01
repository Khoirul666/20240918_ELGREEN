<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="{{asset('image/elgreen.png')}}" />
    <title>SIGN UP | ELGREEN</title>
    
    <link rel="stylesheet" href="{{asset('bootstrap-5.3.0\css\bootstrap.min.css')}}">
</head>

<body class="bg-light">
<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card mt-5 shadow-sm">
                    <div class="card-body">
                        <h2 class="text-center">SIGN UP</h2>
                        <form method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="username" class="form-control" id="username" name="username" placeholder="Enter Username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required>
                            </div>
                            <div class="mb-3">
                                <label for="phone" class="form-label">Phone</label>
                                <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter Phone ex.( 08562... )" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <input type="area" class="form-control" id="alamat" name="alamat" placeholder="Enter Alamat" required>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">SIGN UP</button>
                        </form>
                        <div class="text-center mt-3">
                            <h6>Already a member? <a href="{{route('login')}}">Log In</a></h6>
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