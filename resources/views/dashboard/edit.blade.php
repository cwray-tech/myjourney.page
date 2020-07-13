@extends('layouts.app')
@section('page_title')
    Your Info
@endsection
@section('content')
    <section class="py-40">
        <div class="container px-4 mx-auto">
            <h1 class="text-5xl mb-3">Your Info</h1>
            <div class="flex mt-6">
                <div class="w-1/3 rounded-md bg-white shadow-sm border  mr-3 p-5">
                    <h2 class="text-4xl mb-3">Login Info</h2>
                    <form method="post" action="/dashboard/info/update">
                        @method('update')
                        @csrf
                        <label for="name">Your Name</label>
                        <input class="input" id="email" name="email" required value="{{$user->name}}">
                        <label for="email">Email</label>
                        <input class="input" id="email" name="email" required value="{{$user->email}}">
                        <button type="submit" class="btn btn-cta">Update</button>
                    </form>
                </div>

                @if($user->is_subscribed == 0)
                    <div class="w-1/3 rounded-md bg-white shadow-sm border border-blue-800 mr-3 p-5">
                        <h2 class="text-4xl mb-3">Subscribe to Updates</h2>
                        <p class="mb-4">Subscribe to updates from myjourney.page to stay current with important news from us.</p>
                        <form method="post" action="/newsletter">
                            @csrf
                            <button type="submit" class="btn btn-cta">Subscribe</button>
                        </form>
                    </div>
                    @else
                    <div class="w-1/3 rounded-md bg-white shadow-sm border p-5">
                        <h2 class="text-4xl mb-3">Updates</h2>
                        <p class="mb-4">Great job. You are subscribed to updates, so you will stay current with what happens at myjourney.page!</p>
                        <form method="post" action="/newsletter">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Unsubscribe</button>
                        </form>
                    </div>
                @endif
            </div>
        </div>
    </section>
@endsection
