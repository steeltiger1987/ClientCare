<div class="col-md-9 col-sm-8">
    <table id="tickets" class="table table-bordered table-hover">
        <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Client</th>
            <th>Status</th>
            <th>Last Update</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tickets as $ticket)
        <tr>
            <td>{{$ticket->id}}</td>
            <td>
                <a href="{{route('ticket.show', $ticket->id)}}">{{$ticket->title}}</a>
            </td>
            <td>
                <a href="{{route('admin.client.profile', $ticket->user->id)}}">{{$ticket->user->name}}</a>
            </td>
            <td>
                {{$ticket->present()->ticketStatus}}
            </td>
            <td>
                {{$ticket->present()->lastUpdate}}
            </td>
        </tr>
        @endforeach
    </table>
</div>