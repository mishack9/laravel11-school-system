<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Admin | Register</title>

<base href="{{asset('admincss')}}/" />

<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&amp;display=fallback">

<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">

<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">

<link rel="stylesheet" href="dist/css/adminlte.min2167.css?v=3.2.0">

</head>

<body class="hold-transition register-page">
<div class="register-box">
<div class="card card-outline card-primary">
<div class="card-header text-center">
<a href="index2.html" class="h1"><b>Admin</b></a>
</div>
<div class="card-body">
<p class="login-box-msg"></p>
<form action="{{route('adminRegister')}}" method="post">
    @csrf
<div class="input-group mb-3">
<input type="text" class="form-control" name = "name" placeholder="Full name" style="@error('name')
    border-color:red;
@enderror" value="{{old('name')}}">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-user"></span>
</div>
</div>
</div>
@error('name')
    <p class = "text text-danger">{{ $message }}</p>
@enderror
<div class="input-group mb-3">
<input type="email" class="form-control" name="email" placeholder="Email" style="@error('email')
border-color:red;
@enderror" value="{{old('email')}}">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-envelope"></span>
</div>
</div>
</div>
@error('email')
    <p class = "text text-danger">{{ $message }}</p>
@enderror
<div class="input-group mb-3">
<input type="password" class="form-control" name="password" placeholder="Password" style="@error('password')
border-color:red;
@enderror">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
@error('password')
    <p class = "text text-danger">{{ $message }}</p>
@enderror
<div class="input-group mb-3">
<input type="password" class="form-control" name = "password_confirmation" placeholder="Retype password" style="@error('passwsord')
border-color:red;
@enderror">
<div class="input-group-append">
<div class="input-group-text">
<span class="fas fa-lock"></span>
</div>
</div>
</div>
<div class="row">
<div class="col-8">
<div class="icheck-primary">
<input type="checkbox" id="agreeTerms" name = "agree" name="terms" value="agree">
<label for="agreeTerms">
I agree to the <a href="#">terms</a>
</label>
</div>
</div>

<div class="col-4">
<button type="submit" class="btn btn-primary btn-block">Register</button>
</div>

</div>
</form>
<div class="social-auth-links text-center">
<a href="#" class="btn btn-block btn-primary">
<i class="fab fa-facebook mr-2"></i>
Sign up using Facebook
</a>
<a href="#" class="btn btn-block btn-danger">
<i class="fab fa-google-plus mr-2"></i>
Sign up using Google+
</a>
</div>
<a href="{{ route('admin.login') }}" class="text-center">I already have a membership</a>
</div>

</div>
</div>


<script src="plugins/jquery/jquery.min.js"></script>

<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="dist/js/adminlte.min2167.js?v=3.2.0"></script>
</body>
</html>
