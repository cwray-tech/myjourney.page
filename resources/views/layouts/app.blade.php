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

    <title>@yield('page_title') | MyJourney</title>
    <meta property="og:title" content="@yield('page_title') | MyJourney" />
    <meta property="og:description" content="@yield('page_description') Share your Journeys with the world." />
    <meta property="og:image" content="https://myjourney.page/images/my-journey-open-graph-image.jpg" />
    <meta property="og:site_name" content="MyJourney.page" />
    <meta property="og:type" content="website" />
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ config('services.google.tracking_id') }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', '{{ config('services.google.tracking_id') }}');
    </script>
    <!-- Font -->
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('head_code')

</head>
<body>
<div id="app" class="bg-gray-50 relative">
    @include('.partials._navbar')

    <div class="relative">
        @yield('content')
    </div>

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
