@extends('layouts.default')

@section('content')
@include('layouts.partials.messages')

<div class="mailbox row">
    <div class="col-xs-12">
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-3 col-sm-4">
                        <a class="btn btn-block btn-primary" data-toggle="modal" data-target="#compose-modal"><i class="fa fa-pencil"></i> Open Ticket</a>
                        @include('layouts.partials.left-side-tickets')
                    </div>
                    @if(Auth::user()->isAdmin())
                        @include('layouts.partials.admin-tickets-list')
                    @elseif(Auth::user()->isClient())
                        @include('layouts.partials.client-tickets-list')
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@if(Auth::user()->isAdmin())
@include('layouts.partials.admin-new-ticket')
@elseif(Auth::user()->isClient())
@include('layouts.partials.client-new-ticket')
@endif

@stop

@section('scripts')
<script type="text/javascript">
    $(function () {
        $("textarea").wysihtml5();
        $('#tickets').dataTable({
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