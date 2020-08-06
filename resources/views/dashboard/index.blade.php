@extends('layouts.app')
@section('page_title')
    Your Dashboard
@endsection
@section('content')
    <section class="py-40">
        <div class="container px-6 mx-auto">
            <div class="p-2">
                <h1 class="text-5xl mb-3">Your Dashboard</h1>
                <p>Great job! You have registered for your account.
                    Now, go ahead and share your journeys.</p>
            </div>

            <div class="grid md:grid-cols-2 gap-4 mt-6">
                @if($user->is_subscribed == 0)
                    <div class="rounded-md bg-white shadow-sm border border-black p-6 pb-8">
                        <h2 class="text-4xl mb-3">Subscribe to Updates</h2>
                        <p class="mb-4">Subscribe to updates from myjourney.page to be up to date with important events.</p>
                        <form method="post" action="/newsletter">
                            @csrf
                            <button type="submit" class="btn btn-cta">Subscribe</button>
                        </form>
                    </div>
                @endif
                <a href="/dashboard/journeys" class="block rounded-md bg-white shadow-sm border border-black p-6 pb-8">
                    <h2 class="text-4xl mb-3">See Journeys</h2>
                    <p class="mb-6">View Journeys you've shared.</p>
                    <button class="btn btn-cta">View Journeys</button>
                </a>
                <a href="{{ route('journeys.create') }}"
                    class="block rounded-md bg-white shadow-sm border-2 border-black p-6 pb-8">
                    <h2 class="text-4xl mb-3">Share a Journey</h2>
                    <p class="mb-6">Share a life journey you have had or wish you could have.</p>
                    <button class="btn btn-cta">Start Writing!</button>
                </a>
            </div>
        </div>
    </section>
@endsection
