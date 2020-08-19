@extends('layouts.app')
@section('page_title')
    Read Journeys
@endsection
@section('content')
    <section class="py-16 justify-center flex flex-col items-center min-h-screen">
        <div class="container px-4 text-center mx-auto">
            <div>
                <h1 class="text-5xl">Explore Journeys</h1>
            </div>

        </div>
    </section>
    <section class="py-16 ">
        <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
            <div class="grid gap-8">
                @include('.partials.journeys._journey_list')
            </div>
        </div>
    </section>
@endsection
