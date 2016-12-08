<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
</head>
<body>
    <h3>Password Reset</h3>
    <div>
        You have requested password reset. Complete this form: {{ URL::to('password/reset', array($token)) }}
    </div>
</body>
</html>