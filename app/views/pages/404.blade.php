<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Not Found</title>
    {{ HTML::style('css/style.css') }}
</head>
<body>
<section class="content">

    <div class="error-page">
        <h2 class="headline text-info"> 404</h2>

        <div class="error-content">
            <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

            <p>
                That's an error
            </p>

            <p>
                The requested URL {{ Request::url() }} was not found on this server. That’s all we know.
            </p>

        </div>
        <!-- /.error-content -->
    </div>
    <!-- /.error-page -->

</section>
</body>
</html>