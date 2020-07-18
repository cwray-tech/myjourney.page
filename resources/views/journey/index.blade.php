@extends('layouts.app')
@section('page_title')
    Read Journeys
@endsection
@section('content')
    <section class="py-40">
        <div class="container px-6 mx-auto">
            <h1 class="text-5xl mb-3">Journeys</h1>
            @forelse($journeys as $journey)
                <a href="/journeys/{{$journey->slug}}">
                    <h2>{{$journey->title}}</h2>
                </a>
                @empty
            Bummer. We don't have any journeys here to share yet, but come back soon to start reading journeys, or <a href="/register" class="underline"> create your own account</a> to start writing your journeys!
            @endforelse
        </div>
    </section>
@endsection
