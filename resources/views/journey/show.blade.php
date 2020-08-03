@extends('layouts.page')
@section('page_title')
    {{ $journey->title }}
@endsection

@section('content')
    {{--<navbar-component inline-template>
        <nav v-cloak  class="py-2 fixed z-50 w-full top-0 transition ease-in-out duration-200">
            <!-- Nav closer -->
            <div @click="toggleNav" :class="navOpen ? 'block' : 'hidden'" class="fixed top-0 bottom-0 right-0 left-0"></div>
            <div class="container px-2 w-full mx-auto">
                <div class="relative flex items-center justify-between h-16">
                    <div class="flex items-center mr-3">
                        <!-- Mobile menu button-->
                        <button @click="toggleNav"
                                class="inline-flex items-center justify-center p-2 rounded-md text-black focus:outline-none transition duration-150 ease-in-out"
                                aria-label="Main menu" aria-expanded="false">
                            <!-- Icon when menu is closed. -->
                            <svg v-if="!navOpen" class="block h-10 w-10" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M4 6h16M4 12h16M4 18h16"/>
                            </svg>
                            <!-- Icon when menu is open. -->
                            <svg v-else v-cloak class="block h-10 w-10" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                      d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

            <!--
              Mobile menu, toggle classes based on menu state.

              Menu open: "block", Menu closed: "hidden"
            -->
            <div :class="navOpen ? 'block': 'hidden'" v-cloak
                 class="origin-bottom-left absolute ml-4 mt-2 bg-white w-1/2 lg:w-1/4 rounded-md shadow-lg">

                <div class=" flex flex-col items-stretch pl-4 pt-2 pb-3 shadow-xs rounded-md">
                    @foreach($journey->steps as $step)
                    <a @click="toggleNav" href="#{{ $step->id }}"
                       class="px-3 py-2 rounded-md font-medium text-grey-900 leading-5 focus:outline-none transition duration-150 ease-in-out">{{ $step->title }}</a>
                    @endforeach
                </div>
            </div>
            </div>
        </nav>
    </navbar-component>--}}

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
        <section class="">
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

@endsection
