@extends('layouts.app')
@section('page_title')
    Your Dashboard
@endsection
@section('content')
    <section class="py-40">
        <div class="container px-4 mx-auto">
            <h1 class="text-5xl mb-3">Your Dashboard</h1>
            <p>Great job! You have registered for your account!
                You can't quite create a journey yet, but soon you will be able to!</p>
            <div class="flex mt-6">
                @if($user->is_subscribed == 0)
                    <div class="w-1/3 rounded-md bg-white shadow-sm border border-blue-800 mr-3 p-5">
                        <h2 class="text-4xl mb-3">Subscribe to Updates</h2>
                        <p class="mb-4">Subscribe to updates from myjourney.page to stay current with important news from us.</p>
                        <form method="post" action="/newsletter">
                            @csrf
                            <button type="submit" class="btn btn-cta">Subscribe</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
