<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        @if(config('blog.services.googleAnalyticsID'))
            @include('blog.partials.analytics')
        @endif
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        {{-- CSRF Token --}}
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@if (trim($__env->yieldContent('template_title')))@yield('template_title') | @endif {{ config('app.name', trans('titles.app')) }}</title>
        @if (trim($__env->yieldContent('template_description')))
            <meta name="description" content="@yield('template_description')">
        @endif
        <meta name="author" content="{{ config('blog.author') }}">
        <link rel="shortcut icon" href="/favicon.ico">
        <link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

        <link rel="stylesheet" href="{{ asset('blog/fonts/icomoon/style.css') }}">
        <link rel="stylesheet" href="{{ asset('blog/css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('blog/css/magnific-popup.css') }}">
        <link rel="stylesheet" href="{{ asset('blog/css/jquery-ui.css') }}">
        <link rel="stylesheet" href="{{ asset('blog/css/owl.carousel.min.css') }}">
        <link rel="stylesheet" href="{{ asset('blog/css/owl.theme.default.min.css') }}">
        <link rel="stylesheet" href="{{ asset('blog/css/bootstrap-datepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('blog/fonts/flaticon/font/flaticon.css') }}">
        <link rel="stylesheet" href="{{ asset('blog/css/aos.css') }}">

        <link rel="stylesheet" href="{{ asset('blog/css/style.css') }}">
    </head>
    <body>
        @include('blog.partials.nav')
        @yield('content')
        @include('blog.partials.footer')
        <script src="{{ asset('blog/js/jquery-3.3.1.min.js') }}"></script>
        <script src="{{ asset('blog/js/jquery-migrate-3.0.1.min.js') }}"></script>
        <script src="{{ asset('blog/js/jquery-ui.js') }}"></script>
        <script src="{{ asset('blog/js/popper.min.js') }}"></script>
        <script src="{{ asset('blog/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('blog/js/owl.carousel.min.js') }}"></script>
        <script src="{{ asset('blog/js/jquery.stellar.min.js') }}"></script>
        <script src="{{ asset('blog/js/jquery.countdown.min.js') }}"></script>
        <script src="{{ asset('blog/js/jquery.magnific-popup.min.js') }}"></script>
        <script src="{{ asset('blog/js/bootstrap-datepicker.min.js') }}"></script>
        <script src="{{ asset('blog/js/aos.js') }}"></script>
        <script src="{{ asset('blog/js/main.js') }}"></script>
        <script>
            $("#btn-subscribe-us").click(function(e) {
                e.preventDefault(); // avoid to execute the actual submit of the form.

                var form = $('#form-subscribe-us');
                var url = form.attr('action');

                $.ajax({
                    type: form.attr('method'),
                    url: url,
                    data: form.serialize(), // serializes the form's elements.
                    success: function(data)
                    {
                        $("#subscribe-us-msg").text("Thankyou for subscribing us!");
                        $("#subscribe-us-email").val("");
                    },
                    error: function(errors)
                    {
                        $("#subscribe-us-msg").text("You entered invalid email id");
                    }
                });
                return false;
            });
            
            $("#btn-post-search").click(function(e){
                $("#search-error").hide();
                if ($("#q").val().trim() != "") {
                    var uri = $("#search-form").attr('action')+"?q="+$("#q").val().trim();
                    location.href = uri;
                    return false;
                } else {
                    $("#search-error").show();
                    return false;
                }
            });
        </script>
    </body>
</html>