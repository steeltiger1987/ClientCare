<div class="navbar-right">
    <ul class="nav navbar-nav">
        <li class="dropdown tasks-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                Themes <i class="caret"></i>
            </a>
            <ul class="dropdown-menu">
                <li class="header"><a href="{{URL::to('themes/sky')}}">Sky</a></li>
                <li class="header"><a href="{{URL::to('themes/dark')}}">Dark </a></li>
            </ul>
        </li>
        <!-- USER DROP DOWN -->
        <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="glyphicon glyphicon-user"></i>
                <span>{{ $user->name }} <i class="caret"></i></span>
            </a>
            <ul class="dropdown-menu">
                <li class="user-header">
                    <p>
                        {{ $user->name }}
                        <small>Registered since: {{ $user->present()->registerTime}}</small>
                    </p>
                </li>
                <li class="user-footer">
                    <div class="pull-left">
                        <a href="{{route('edit.profile')}}" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                        <a href="{{route('logout')}}" class="btn btn-default btn-flat">Sign out</a>
                    </div>
                </li>
            </ul>
        </li>
        <!-- END USER DROP DOWN -->
    </ul>
</div>