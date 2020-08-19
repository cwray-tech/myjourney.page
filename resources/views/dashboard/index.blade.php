@extends('layouts.app')
@section('page_title')
    Your Dashboard
@endsection
@section('content')
    <section class="py-16 min-h-screen">
        <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
            <div class="p-2">
                <h1 class="text-4xl leading-9 font-bold">Your Dashboard</h1>
            </div>

            <div class="grid md:grid-cols-2 gap-4 mt-6">
                <a href="/dashboard/journeys" class="block rounded-md bg-white shadow sm:rounded-lg p-6 pb-8">
                    <h2 class="text-3xl font-bold mb-3">See Journeys</h2>
                    <p class="mb-6">View all of the Journeys you have shared.</p>
                    <button class="btn btn-cta">View Journeys</button>
                </a>
                <a href="{{ route('journeys.create') }}"
                    class="block rounded-md bg-white bg-white shadow sm:rounded-lg p-6 pb-8">
                    <h2 class="text-3xl font-bold mb-3">Share a Journey</h2>
                    <p class="mb-6">Share a life journey you have had or wish you could have.</p>
                    <button class="btn btn-cta">Start Writing!</button>
                </a>
            </div>
            <div class="mt-10">
                <div class="md:flex items-center justify-between px-2">
                    <div class="md:mb-0">
                        <h2 class="text-4xl leading-9 font-bold">Recent Journeys</h2>
                    </div>
                    <a href="{{ route('journeys.create') }}" class="btn btn-primary py-3 mt-0">Write Journey</a>
                </div>
                <div class="mt-6">
                    @include('partials.journeys._user_journeys_list')
                </div>
            </div>
        </div>
    </section>
@endsection
