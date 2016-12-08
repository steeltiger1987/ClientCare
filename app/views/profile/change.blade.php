@extends('layouts.default')

@section('content')

@include('layouts.partials.messages')

<div class="row">
    <div class="col-xs-12">
        {{ Form::open() }}
        <div class="box">
            <div class="box-header">
                <h3 class="box-title">Edit Profile</h3>
            </div>
            <div class="box-body">
                <div class="form-group">
                    {{ Form::label('email', 'Email Address:') }}
                    {{ Form::email('email', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('password', 'Password:') }}
                    {{ Form::password('password', ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('email', 'Confirm Password:') }}
                    {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                </div>
            </div>
            <div class="box-footer">
                <div class="form-group">
                    {{ Form::submit('Save changes', ['class' => 'btn btn-primary']) }}
                </div>
            </div>
        </div>
        {{ Form::close() }}
    </div>
</div>
@stop