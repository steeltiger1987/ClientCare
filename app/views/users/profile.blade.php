@extends('layouts.default')

@section('content')

@include('layouts.partials.messages')

<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <i class="fa fa-user"></i>

                <h3 class="box-title">Edit Info</h3>
            </div>
            {{ Form::open() }}
            <div class="box-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            {{ Form::label('name', 'Name:') }}
                            {{ Form::text('name', $client->name, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            {{ Form::label('email', 'Email:') }}
                            {{ Form::email('email', $client->email, ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            {{ Form::label('password', 'Password:') }}
                            {{ Form::password('password', ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            {{ Form::label('password', 'Confirm Password:') }}
                            {{ Form::password('password_confirmation', ['class' => 'form-control']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            {{ Form::label('phone', 'Phone Number:') }}
                            {{ Form::text('phone', $client->phone, ['class' => 'form-control']) }}
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            {{ Form::label('status', 'User Status:') }}
                            {{ Form::select('status', ['1'=>'Active', '0' => 'Blocked'], $client->active, ['class'=>'form-control']) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="box-footer">
                {{ Form::submit('Save Changes', ['class' => 'btn btn-primary']) }}
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <div class="box box-danger">
            <div class="box-header">
                <i class="fa fa-tags"></i>

                <h3 class="box-title">User Tickets</h3>
            </div>
            <div class="box-body table-responsive">
                <table id="tickets" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Status</th>
                        <th>Last Update</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(count($client->tickets) > 0)
                    @foreach($client->tickets as $ticket)
                    <tr>
                        <td>{{$ticket->id}}</td>
                        <td><a href="{{route('ticket.show', $ticket->id)}}">{{$ticket->title}}</a></td>
                        <td>{{$ticket->present()->ticketStatus}}</td>
                        <td>{{$ticket->present()->lastUpdate}}</td>
                    </tr>
                    @endforeach
                    @endif
                </table>
            </div>
        </div>
    </div>
</div>

@stop

@section('scripts')
<script type="text/javascript">
    $(function () {
        $('#tickets').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });

        $('#suggestions').dataTable({
            "bPaginate": true,
            "bLengthChange": true,
            "bFilter": true,
            "bSort": true,
            "bInfo": true,
            "bAutoWidth": false
        });
    });
</script>
@stop