@extends('layouts.page')
@section('page_title')
    {{ $journey->title }}
@endsection

@section('page_description')
    {{ $journey->introduction }}
@endsection

@section('page_image'){{$journey->picture ? $journey->picture_path : "https://myjourney.page/images/my-journey-open-graph-image.jpg" }}@endsection

@section('content')
    @if($journey->picture)
        <section class="md:flex min-h-screen items-stretch bg-gray-50">
            <div class="md:w-1/3 overflow-hidden flex items-stretch flex-grow">
                <img class="object-cover w-full h-full" alt="{{ $journey->title }}"
                     src="{{ $journey->picture_path }}">
            </div>
            <div class="py-16 md:w-2/3 lg:p-20 w-full flex flex-col items-start justify-center">
                @include('.partials.journeys._journey_intro')

            </div>

        </section>
    @else
        <section class="py-16 min-h-screen justify-center flex flex-col items-center">
                @include('.partials.journeys._journey_intro')
        </section>

    @endif
    <section class="py-16">
        @if($steps->count() >0 )
            <div class="journey-section max-w-screen-xl px-4 md:pr-4 pr-0 mb-40 mx-auto relative">
                {{ $steps->links('.partials.journeys._page_number_pagination') }}
                <div class="timeline-container">
                    <div class="timeline"></div>
                    <div class="timeline-dot"></div>

                </div>

                @foreach($steps as $step)
                    @include('.partials.steps._step')
                @endforeach


            </div>
            <div
                class="mx-auto container lg:max-w-screen-lg px-4 mb-40">{{ $steps->links('.partials.journeys._journey_step_paginator') }}</div>
        @endif
        <div class="relative pb-40 container px-4 mx-auto">
            <h2 class="text-4xl font-extrabold text-center mb-8">{{ $journey->title }}</h2>
            <div class="flex items-center justify-center flex-wrap flex-col md:flex-row">
                <a href="{{route('journeys.create')}}" class="btn btn-cta mx-2 mb-3">Write a Journey</a>
                <a href="{{route('journeys.index')}}" class="btn btn-primary mx-2 mb-3">View All Journeys</a>
            </div>
        </div>

    </section>
    @can('update', $journey)
        @include('.partials.journeys.journey_show_user_buttons')
    @endcan
@endsection
