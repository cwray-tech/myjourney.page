<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon"
          type="image/svg"
          href="https://myjourney.page/images/devjourney.svg">
    <link rel="apple-touch-icon" type="image/jpg" href="https://myjourney.page/images/map.jpg" />
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('page_title') | MyJourney.page</title>
    <meta property="og:title" content="@yield('page_title') | MyJourney.page" />
    <meta property="og:description" content="@yield('page_description') Share your Journeys with the world." />
    <meta property="og:image" content="https://myjourney.page/images/my-journey-open-graph-image.jpg" />
    <meta property="og:site_name" content="MyJourney.page" />
    <meta property="og:type" content="website" />


    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" data-turbolinks-track="true">
    <!-- Scripts -->
    <script src="/js/manifest.js" data-turbolinks-track="true"></script>
    <script src="/js/vendor.js" data-turbolinks-track="true"></script>
    <script src="/js/app.js" data-turbolinks-track="true"></script>
    <script>
        document.addEventListener('turbolinks:load', function (event) {
            document.querySelectorAll('a[href^="#"]').forEach(function (el) {
                el.setAttribute('data-turbolinks', false);
            });
        });
    </script>
</head>
<body>
<div id="app">
    @include('.partials._navbar')

    <main class="min-h-screen">
        @yield('content')
    </main>

    @if (session('status'))
        <alert-component message="{{ session('status') }}"></alert-component>
    @endif
    @include('.partials._footer')
</div>


</body>
</html>
