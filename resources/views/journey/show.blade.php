@extends('layouts.page')
@section('page_title')
    {{ $journey->title }}
@endsection
@section('page_description')
    {{ $journey->introduction }}
@endsection

@section('content')

    @if($journey->picture)
        <section class="md:flex min-h-screen items-stretch mb-40 border-b">
                <div class="md:w-1/3 w-full md:min-h-screen md:max-h-screen  h-64 overflow-hidden flex items-stretch flex-grow">
                    <img style="object-fit:cover" class="object-cover" alt="{{ $journey->title }}" src="{{ $journey->picture_path }}">
                </div>
                <div class="p-6 md:w-2/3 lg:p-10 w-full flex flex-col items-start justify-center">
                    <h1 class="text-5xl mb-3">{{$journey->title}}</h1>
                    <p>{{$journey->introduction}}</p>
                    <div class="text-2xl font-bold my-8">by {{$journey->user->name}}</div>
                </div>

        </section>
    @else
        <section class="py-40 min-h-screen justify-center flex flex-col items-center">
            <div class="container px-4 text-center mx-auto">

                <h1 class="text-5xl mb-3">{{$journey->title}}</h1>
                <p>{{$journey->introduction}}</p>
                <div class="text-2xl font-bold my-8">by {{$journey->user->name}}</div>
            </div>
        </section>

        @endif
        <section>
            @if($steps->count() >0 )
                <div class="journey-section container px-6 mb-40 mx-auto relative">

                    <div class="timeline-container">
                        <div class="timeline"></div>
                        <div class="timeline-dot"></div>
                    </div>

                    @foreach($steps as $step)
                        <div id="{{ $step->id }}" class="journey-step py-10 pl-8 md:pl-0">
                            @if($step->picture)
                                <img class="md:w-1/3 w-full mb-6 md:mb-0 rounded mx-auto" alt="{{ $step->title }}" src="{{ $step->picture_path }}">
                            @endif
                            <div class="border journey-step-content rounded p-6">

                                <div class="text-lg">
                                    {{ date('F d, Y', strtotime($step->date)) }}
                                </div>
                                <h2 class="text-4xl mb-2 capitalize">{{ $step->title }}</h2>
                                @if($step->time)
                                    <div class="mb-2">{{ date('h:i:s a',  strtotime($step->time)) }} </div>
                                @endif
                                <p class="color-contrast-medium">{{ $step->description }}</p>
                            </div>

                        </div>
                    @endforeach

                </div>
            @endif
            <div class="pb-40 container px-4 mx-auto">
                <h2 class="text-5xl text-center pb-12">This is {{ $journey->title }}</h2>
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
