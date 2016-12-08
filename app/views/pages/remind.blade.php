<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    {{ HTML::style('css/bootstrap.min.css') }}
    {{ HTML::style('css/signin.css') }}
    {{ HTML::style('css/iCheck/blue.css') }}
    {{ HTML::style('css/style.css') }}
    <title>Password Reminder</title>
</head>
<body>
<div class="wrapper">
    {{ Form::open(['class' => 'form-signin']) }}
    <h3 class="form-signin-heading">Reminder</h3>

    <div class="form-group">
        {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email Address']) }}
        {{ $errors->first('email', '<span class="text-danger">:message</span>') }}
        @if(Session::has('status'))
        <span class="text-info">{{Session::get('status')}}</span>
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