@extends('layouts.app')
@section('page_title')
    Read Journeys
@endsection
@section('content')
    <section class="py-40 justify-center flex flex-col items-center min-h-screen">
        <div class="container px-4 text-center mx-auto">
            <div>
                <h1 class="text-5xl">Explore Journeys</h1>
            </div>

        </div>
    </section>
    <section class="py-40">
        <div class="container px-6 mx-auto">
            <div class="grid gap-8">
                @forelse($journeys as $journey)
                    <a href="{{ route('journeys.show', $journey->slug) }}" target="_blank" class="rounded-md md:flex items-stretch justify-start w-full shadow-sm overflow-hidden border hover:shadow-md transition ease-in-out duration-150">
                            @if($journey->picture)
                                <div class="md:w-1/2 max-h-80 overflow-hidden">
                                    <img src="{{$journey->picture_path}}" class="object-cover w-full h-full" alt="{{$journey->title}}">
                                </div>
                            @endif
                        <div class=" md:w-1/2 p-6 pb-8 flex flex-col justify-center items-start">
                            <h2 class="text-4xl mb-3">{{ $journey->title }}</h2>
                            <p class="mb-4">{{ $journey->introduction }}</p>
                            <button class="btn btn-cta">Read Journey</button>
                        </div>
                    </a>
                @empty
                    <div class="col-span-3 px-8 text-center">Bummer. We don't have any journeys here to share yet, but come back soon to start reading journeys, or <a href="/register" class="underline"> create your own account</a> to start writing your journeys!</div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
