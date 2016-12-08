<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/signin.css') }}
    {{ HTML::style('css/iCheck/blue.css') }}
    {{ HTML::style('css/style.css') }}
    <title>Login</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    {{ HTML::script('js/iCheck/icheck.min.js') }}
    <script type="text/javascript">
        $(document).ready(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</head>
<body>
<div class="wrapper">
    {{ Form::open(['class' => 'form-signin']) }}
    <h3 class="form-signin-heading">Sign in</h3>

    <div class="form-group">
        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) }}
    </div>
    <div class="form-group">
        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
    </div>
    <div class="form-group">
        @if(Session::has('errors'))
        <label class="text-danger">{{ $errors->first() }}</label>
        @endif
    </div>
    <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    </div>
    <div class="form-group">
        <label labe><input type="checkbox" name="remember"/> &nbsp; Remember me</label>
    </div>
    <div class="form-group">
        <a href="{{ route('register') }}" class="pull-left">New Account</a>
        <a href="{{ URL::to('password/remind') }}" class="pull-right">Reset Password</a>
    </div>
    {{ Form::close() }}
</div>
{{ HTML::script('js/bootstrap.min.js') }}
</body>
</html>