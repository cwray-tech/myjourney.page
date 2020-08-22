@extends('layouts.app')
@section('page_title')
    Read Journeys
@endsection
@section('content')
    <section class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 xl:mt-28">
        <div class="text-center">
            <h1 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                Explore
                <br class="xl:hidden">
                <span class="text-yellow-600">Journeys</span>
            </h1>
            <p class="mt-3 max-w-md mx-auto text-base text-gray-500 sm:text-lg md:mt-5 md:text-xl md:max-w-3xl">
                On this page, you can read journeys users have shared publicly.
            </p>
        </div>
    </section>
    <section class="py-16 ">
        <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8 lg:max-w-screen-lg mx-auto">
                @include('.partials.journeys._journey_list')
            </div>
        </div>
    </section>
@endsection
