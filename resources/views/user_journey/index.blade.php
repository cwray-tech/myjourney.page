@extends('layouts.app')
@section('page_title')
    Your Dashboard
@endsection
@section('content')
    <section class="py-40">
        <div class="max-w-screen-lg px-6 mx-auto">
            <h1 class="text-5xl mb-3">Your Journeys</h1>
            <p>View the Journeys you've created.</p>
            <div class="mt-6">
                @forelse($journeys as $journey)
                    <div  class="rounded-md w-full flex mb-6 bg-white shadow-sm border border-black p-5">
                        <div class="">
                            <img src="/images/devjourney.svg" class="w-20">
                        </div>
                       <div class="pl-6">
                           <h2 class="text-4xl mb-3">{{ $journey->title }}</h2>
                           <a href="{{route('journeys.show', $journey->slug)}}" class="underline">View Public Journey</a>
                       </div>

                    </div>
                @empty
                    <a class="rounded-md bg-white shadow-sm border border-black p-5">
                        <h2 class="text-4xl mb-3">Bummer, you haven't created any journeys yet. Want to add one?</h2>
                        <p class="mb-4">Create a journey by clicking on this link.</p>
                    </a>
                @endforelse
            </div>
        </div>
    </section>
@endsection
