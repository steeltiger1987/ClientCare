<div style="margin-top: 15px;">
    <ul class="nav nav-pills nav-stacked">
        <li class="header">Categories</li>
        <li class="{{ Request::is('*/tickets') ? 'active' : null }}">
            <a href="{{ link_to_tickets() }}"><i class="fa fa-inbox"></i> All Tickets ({{$allTickets}})</a>
        </li>
        <li class="{{ Request::is('*/open') ? 'active' : null }}">
            <a href="{{link_to_open_tickets()}}">
                <i class="fa fa-pencil-square-o"></i> Open Tickets ({{$openTickets}})</a>
        </li>
        <li class="{{ Request::is('*/resolved') ? 'active' : null }}">
            <a href="{{link_to_resolved_tickets()}}">
                <i class="fa fa-mail-forward"></i> Resolved Tickets ({{$resolvedTickets}})</a>
        </li>
    </ul>
</div>