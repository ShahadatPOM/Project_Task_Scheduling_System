<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>

<h2>Welcome to the site</h2>
<br>
Your registered email-id is {{ $email}}
Your Password is {{ $password}},
Please change Your Password first.
<br>
<a style="color: black" href="{{route('root')}}">Click Here to Login</a>
</body>
</html>
