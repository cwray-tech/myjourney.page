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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

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

<!-- Scripts -->
<script src="/js/manifest.js"></script>
<script src="/js/vendor.js"></script>
<script src="/js/app.js"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    var stripe = Stripe("{{ config('services.stripe.key') }}");
</script>
@yield('body_code')
</body>
</html>
