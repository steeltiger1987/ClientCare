@extends('layouts.default')

@section('content')

@include('layouts.partials.messages')

<div class="row">
    <div class="col-xs-12">
        <div class="[ panel panel-default ] panel-google-plus">
            @if($user->isAdmin())
            <div class="dropdown">
                    <span class="dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="[ glyphicon glyphicon-chevron-down ]"></span>
                    </span>
                <ul class="dropdown-menu" role="menu">
                    @if($ticket->status == 0)
                    <li role="presentation"><a role="menuitem" tabindex="-1"
                                               href="{{route('ticket.resolve', $ticket->id)}}">Mark as Resolved</a></li>
                    @else
                    <li role="presentation"><a role="menuitem" tabindex="-1"
                                               href="{{route('ticket.open', $ticket->id)}}">Mark as Open</a></li>
                    @endif
                </ul>
            </div>
            @endif
            <div class="panel-heading">
                <img class="img-circle pull-left profile-picture"
                     src="http://placehold.it/160x160"
                     alt="Profile Picture"/>

                <h3>{{$ticket->user->name}}</h3>
                <h5>{{$ticket->present()->createdTime}}</h5>
            </div>
            <div class="panel-body">
                <p>{{$ticket->content}}</p>
                @if(count($ticket->attachment) > 0)
                <p>
                    <a href="{{route('downloads', $ticket->attachment->alias)}}">{{$ticket->attachment->orginal_name}}</a>
                </p>
                @endif
            </div>
        </div>
        @foreach($ticket->comments as $comment)
        @include('layouts.partials.single-ticket-view')
        @endforeach
    </div>
</div>

@if($ticket->status == '0')
@include('layouts.partials.new-ticket-comment')
@endif

@stop

@section('scripts')
<script type="text/javascript">
    $(function () {
        $("textarea").wysihtml5();
    });
</script>
@stop