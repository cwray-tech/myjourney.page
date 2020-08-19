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
        <section class="md:flex min-h-screen items-stretch">
            <div
                class="md:w-1/3 overflow-hidden flex items-stretch flex-grow">
                <img class="object-cover w-full h-full" alt="{{ $journey->title }}"
                     src="{{ $journey->picture_path }}">
            </div>
            <div class="p-6 md:w-2/3 lg:p-20 w-full flex flex-col items-start justify-center">
                @include('.partials.journeys._journey_intro')
            </div>

        </section>
    @else
        <section class="py-16 min-h-screen justify-center flex flex-col items-center">
            <div class="lg:max-w-screen-lg container px-4 mx-auto">
                @include('.partials.journeys._journey_intro')
            </div>
        </section>

    @endif
    <section class="py-10 relative">
        <div class="hidden lg:block lg:absolute lg:inset-y-0 lg:h-full lg:w-full">
            <div class="relative h-full text-lg max-w-prose mx-auto">
                <svg class="absolute top-0 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="74b3fd99-0a6f-4271-bef2-e80eeafdf357" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#74b3fd99-0a6f-4271-bef2-e80eeafdf357)" />
                </svg>
                <svg class="absolute top-1/2 right-full transform -translate-y-1/2 -translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="f210dbf6-a58d-4871-961e-36d5016a0f49" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#f210dbf6-a58d-4871-961e-36d5016a0f49)" />
                </svg>
                <svg class="absolute bottom-12 left-full transform translate-x-32" width="404" height="384" fill="none" viewBox="0 0 404 384">
                    <defs>
                        <pattern id="d3eb07ae-5182-43e6-857d-35c643af9034" x="0" y="0" width="20" height="20" patternUnits="userSpaceOnUse">
                            <rect x="0" y="0" width="4" height="4" class="text-gray-200" fill="currentColor" />
                        </pattern>
                    </defs>
                    <rect width="404" height="384" fill="url(#d3eb07ae-5182-43e6-857d-35c643af9034)" />
                </svg>
            </div>
        </div>
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
            <h2 class="text-5xl text-center pb-12">{{ $journey->title }}</h2>
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
