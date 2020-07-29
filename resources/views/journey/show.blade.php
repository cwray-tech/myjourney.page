@extends('layouts.app')
@section('page_title')
    {{ $journey->title }}
@endsection

@section('content')
    <section class="py-40 border-b border-black">
        <div class="container px-4 text-center mx-auto">
            <h1 class="text-5xl mb-3">{{$journey->title}}</h1>
            <p>{{$journey->introduction}}</p>

        </div>
    </section>
    <section class="">
        <div class="container px-6 mb-40 mx-auto relative">
            <div class="timeline-container">
                <div class="timeline"></div>
                <div class="timeline-dot"></div>
            </div>
            @foreach($journey->steps as $step)
                <div class="journey-step py-40 flex items-center">
                    <div class="text-4xl pr-20 py-2 w-1/3">
                        {{ date('F d, Y', strtotime($step->date)) }}
                    </div>
                    <div class="w-2/3">
                        <h2 class="text-5xl mb-4 capitalize">{{ $step->title }}</h2>
                        <p class="color-contrast-medium">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            Iusto, optio, dolorum provident rerum aut hic quasi placeat iure tempora laudantium ipsa ad
                            debitis unde? Iste voluptatibus minus veritatis qui ut.</p>
                    </div>

                </div>
            @endforeach
        </div>

    </section>
@endsection
