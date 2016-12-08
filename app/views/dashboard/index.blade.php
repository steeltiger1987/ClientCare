@extends('layouts.default')

@section('content')
<div class="row">
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3> {{ $counts['allTickets'] }} </h3>

                <p> All Tickets </p>
            </div>
            <div class="icon">
                <i class="fa fa-envelope-o"></i>
            </div>
            <a href="{{ link_to_tickets() }}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3> {{ $counts['resolvedTickets'] }} </h3>

                <p> Resovled Tickets </p>
            </div>
            <div class="icon">
                <i class="fa fa-tags"></i>
            </div>
            <a href="{{ link_to_resolved_tickets() }}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-green">
            <div class="inner">
                <h3> {{ $counts['openTickets'] }} </h3>

                <p> Open Tickets </p>
            </div>
            <div class="icon">
                <i class="fa fa-tags"></i>
            </div>
            <a href="{{ link_to_open_tickets() }}" class="small-box-footer">
                More infor <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    @if(Auth::user()->isAdmin())
    <div class="col-lg-3 col-xs-6">
        <div class="small-box bg-red">
            <div class="inner">
                <h3> {{$counts['clients']}} </h3>

                <p> Clients </p>
            </div>
            <div class="icon">
                <i class="fa fa-users"></i>
            </div>
            <a href="{{route('admin.clients')}}" class="small-box-footer">
                More info <i class="fa fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
    @endif
</div>
@stop