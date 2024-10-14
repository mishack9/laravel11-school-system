<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    @if(Session::has('error'))
    <p class="aleert alert-danger">{{ Session::get('error') }}</p>
    @endif

    @if(Session::has('success'))
    <p class="aleert alert-danger">{{ Session::get('success') }}</p>
    @endif
    
<h1> <a href="{{route('student.login')}}">Logout</a></h1>

</body>
</html>