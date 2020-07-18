@extends('layouts.app')

@section('content')
    <section class="py-40">
        <div class="container px-4 mx-auto">
            <h1 class="text-5xl mb-3">{{$journey->title}}</h1>
            <p>{{$journey->introduction}}</p>
            @foreach($journey->steps as $step)
                {{$step->title}}
                @endforeach
        </div>
    </section>
@endsection
