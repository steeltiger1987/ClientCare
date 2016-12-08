@if(Session::has('errors'))
<div class="row">
    <div class="col-xs-12">
        <div class="alert alert-danger alert-dismissable">
            <i class="fa fa-ban"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Alert!</b> {{ $errors->first() }}
        </div>
    </div>
</div>
@endif

@if(Session::has('message'))
<div class="row">
    <div class="col-xs-12">
        <div class="alert alert-success alert-dismissable">
            <i class="fa fa-ban"></i>
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <b>Alert!</b> {{ Session::get('message') }}
        </div>
    </div>
</div>
@endif