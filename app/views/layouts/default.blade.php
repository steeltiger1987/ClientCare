<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>ClientCare</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    {{ HTML::style('css/style.css') }}
</head>
<body class="{{$skin}}">

<!-- HEADER -->
<header class="header">
    <a href="{{link_to_dashboard()}}" class="logo">
        ClientCare
    </a>
    <nav class="navbar navbar-static-top" role="navigation">
        <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        @include('layouts.partials.navbar-right')
    </nav>
</header>

<div class="wrapper row-offcanvas row-offcanvas-left">
    @if(Auth::user()->isAdmin())
    @include('layouts.partials.left-side-admin')
    @elseif(Auth::user()->isClient())
    @include('layouts.partials.left-side-client')
    @endif
    <aside class="right-side">
<!--        <section class="content-header">-->
<!--            <h1>Dashboard</h1>-->
<!--        </section>-->

        <!-- MAIN CONTENT -->
        <section class="content">
            @yield('content')
        </section>
        <!-- END MAIN CONTENT -->
    </aside>
</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
{{ HTML::script('js/bootstrap.min.js') }}
{{ HTML::script('js/app.js') }}
{{ HTML::script('js/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}
{{ HTML::script('js/datatables/jquery.dataTables.js') }}
{{ HTML::script('js/datatables/dataTables.bootstrap.js') }}

@yield('scripts')
</body>
</html>