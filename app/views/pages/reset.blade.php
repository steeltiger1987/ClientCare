<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/signin.css') }}
    {{ HTML::style('css/iCheck/blue.css') }}
    {{ HTML::style('css/style.css') }}
    <title>Password Reset</title>
</head>
<body>
<div class="wrapper">
    {{ Form::open(['class' => 'form-signin']) }}
    <input type="hidden" name="token" value="{{$token}}" />
    <h3 class="form-signin-heading">Password Reset</h3>

    <div class="form-group">
        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) }}
    </div>
    <div class="form-group">
        {{ Form::password('password', ['class' => 'form-control', 'placeholder' => 'Password']) }}
    </div>
    <div class="form-group">
        {{ Form::password('password_confirmation', ['class' => 'form-control', 'placeholder' => 'Confirm Password']) }}
        @if(Session::has('error'))
        <span class="text-danger">{{Session::get('error')}}</span>
        @endif
    </div>
    <div class="form-group">
        <button class="btn btn-lg btn-primary btn-block" type="submit">Submit</button>
    </div>
    {{ Form::close() }}
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
{{ HTML::script('js/bootstrap.min.js') }}
</body>
</html>