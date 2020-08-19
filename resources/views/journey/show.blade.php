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
    <section class="bg-gray-50 py-10">
        @if($steps->count() >0 )
            <div class="journey-section container px-4 md:pr-4 pr-0 mb-40 mx-auto relative">
                {{ $steps->links('.partials.journeys._page_number_pagination') }}
                <div class="timeline-container">
                    <div class="timeline"></div>
                    <div class="timeline-dot"></div>
                </div>

                @foreach($steps as $step)
                    <div id="{{ $step->id }}"
                         class="md:flex odd:flex-row-reverse justify-center flex-row items-center py-16 pl-6 md:pl-0">
                        @if($step->picture)
                            <div class="md:w-1/3 mx-auto">

                                <img
                                    class="w-full rounded rounded-r-none shadow shadow-sm rounded-b-none md:rounded-r md:rounded-b"
                                    alt="{{ $step->title }}" src="{{ $step->picture_path }}">

                            </div>
                        @endif
                        <div
                            class="relative bg-white shadow shadow-md rounded journey-step-content px-6 py-10 rounded-r-none md:rounded-r">
                            @if($step->time)
                                <div class="text-3xl leading-6 mb-6">{{ $step->formattedTime() }} </div>
                            @endif
                            @can('update', $journey)
                                <journey-step-update-component :step="{{$step}}"></journey-step-update-component>
                            @else
                                <h2 class="mb-4 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">{{ $step->title }}</h2>

                                <p class="whitespace-pre-wrap text-lg text-gray-500 mx-auto">{{ $step->description }}</p>
                            @endcan
                            <div class="text-lg font-bold text-gray-600 mt-3">
                                {{ $step->formatted_date }}
                            </div>
                        </div>

                    </div>
                @endforeach

            </div>
            <div
                class="mx-auto container lg:max-w-screen-lg px-4 mb-40">{{ $steps->links('.partials.journeys._journey_step_paginator') }}</div>
        @endif
        <div class="pb-40 container px-4 mx-auto">
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
