@extends('layouts.app')
@section('page_title')
    Your Dashboard
@endsection
@section('content')
    <section class="py-40">
        <div class="container px-4 mx-auto">
            <h1 class="text-5xl mb-3">Your Dashboard</h1>
            <p>Great job! You have registered for your account!
                You can't quite create a journey yet, but soon you will be able to.</p>
            <div class="md:grid lg:grid-cols-3  grid-cols-2 gap-4 mt-6">
                @if($user->is_subscribed == 0)
                    <div class="rounded-md bg-white shadow-sm border border-blue-800 p-5">
                        <h2 class="text-4xl mb-3">Subscribe to Updates</h2>
                        <p class="mb-4">Subscribe to updates from myjourney.page to find out when you are able to start posting journeys.</p>
                        <form method="post" action="/newsletter">
                            @csrf
                            <button type="submit" class="btn btn-cta">Subscribe</button>
                        </form>
                    </div>
                @else
                    <div class="rounded-md bg-white shadow-sm border border-blue-800 p-5">
                        <h2 class="text-4xl mb-3">You are awesome.</h2>
                        <p class="mb-4">As soon as we make journeys available to share, we will send you an email.</p>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
