<aside class="left-side sidebar-offcanvas">
    <section class="sidebar">

        <!-- SIDEBAR USER PANEL -->
        <div class="user-panel">
            <div class="pull-left info">
                <p>Hello, {{ $user->name }}</p>
                <a href="{{ route('edit.profile') }}">Edit Profile</a>
            </div>
        </div>

        <!-- SIDEBAR MENU -->
        <ul class="sidebar-menu">
            <li class="{{ Request::is('client') ? 'active' : null }}">
                <a href="{{ link_to_dashboard() }}">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li class="{{ Request::is('client/tickets') ? 'active' : null }}">
                <a href="{{ link_to_tickets() }}">
                    <i class="fa fa-tags"></i> <span>Tickets</span>
                </a>
            </li>
        </ul>

    </section>
</aside>