<div class="modal fade" id="compose-modal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title"><i class="fa fa-envelope-o"></i> Open New Ticket</h4>
            </div>
            {{ Form::open(['files' => 'true', 'route' => 'client.tickets']) }}
            <div class="modal-body">
                <div class="form-group">
                    {{ Form::label('title', 'Title:') }}
                    {{ Form::text('title', null, ['class' => 'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::textarea('content', null, ['class'=>'form-control', 'placeholder' => 'Write something here', 'style' => 'height:120px' ]) }}
                </div>
                <div class="form-group">
                    <input type="file" name="attachment"/>
                </div>
            </div>
            <div class="modal-footer clearfix">

                <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                        class="fa fa-times"></i> Discard
                </button>

                <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope"></i> Submit Ticket
                </button>
            </div>
            {{ Form::close() }}
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>