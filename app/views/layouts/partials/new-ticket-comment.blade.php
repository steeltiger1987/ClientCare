<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            {{ Form::open(['route' => ['ticket.show', $ticket->id], 'files' => 'true' ]) }}
            <div class="box-body">
                {{ Form::textarea('content', null, ['class'=>'form-control', 'placeholder' => 'Write something here', 'style' => 'height:120px' ]) }}
                <input type="file" name="attachment" style="margin-top: 10px"/>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div>
