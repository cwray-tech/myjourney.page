@extends('layouts.app')
@section('page_title')
    Your Journeys
@endsection
@section('content')
    <section class="py-16 min-h-screen">
        <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
            <div class="md:flex items-center justify-between px-2">
                <div class="mb-6 md:mb-0">
                    <h1 class="text-4xl leading-9 font-bold">Your Journeys</h1>
                    <p>View the Journeys you've created.</p>
                </div>
                <a href="{{ route('journeys.create') }}" class="btn btn-primary py-3 mt-0">Write Journey</a>
            </div>
            <div class="mt-6">
                @include('partials.journeys._user_journeys_list')
            </div>
        </div>
    </section>
@endsection
