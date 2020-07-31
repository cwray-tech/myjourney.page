@extends('layouts.app')
@section('page_title')
    Read Journeys
@endsection
@section('content')
    <section class="py-40 justify-center flex flex-col items-center border-b">
        <div class="container px-4 text-center mx-auto">
            <div>
                <h1 class="text-5xl">Explore Journeys</h1>
            </div>

        </div>
    </section>
    <section class="py-40">
        <div class="container px-6 mx-auto">
            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($journeys as $journey)
                    <a href="{{ route('journeys.show', $journey->slug) }}" target="_blank" class="rounded-md w-full shadow-sm overflow-hidden border hover:shadow-lg transition ease-in-out duration-150">
                            @if($journey->picture)
                                <div class="h-56 overflow-hidden">
                                    <img src="{{$journey->picture}}" class="w-full">
                                </div>
                            @endif
                        <div class="px-5 pt-5 pb-8">
                            <h2 class="text-4xl mb-3">{{ $journey->title }}</h2>
                            <p>{{ $journey->introduction }}</p>
                        </div>
                    </a>
                @empty
                    <div class="col-span-3">Bummer. We don't have any journeys here to share yet, but come back soon to start reading journeys, or <a href="/register" class="underline"> create your own account</a> to start writing your journeys!</div>
                @endforelse
            </div>
        </div>
    </section>
@endsection
