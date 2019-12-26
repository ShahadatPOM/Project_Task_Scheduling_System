<!DOCTYPE html>
<html>
<head>
    <title>Reset Password</title>
</head>
<body>
<h2>Welcome to the site</h2>
<br>
Your registered email-id is {{ $user->email}}
<br>
<a href="{{url('user/reset-password',$user->id)}}">Click Here to Reset Password</a>
</body>
</html>
