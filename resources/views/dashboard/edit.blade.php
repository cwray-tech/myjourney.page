@extends('layouts.app')
@section('page_title')
    Your Info
@endsection
@section('content')
    <section class="">
        <div class="max-w-7xl py-16 bg-gray-50 mt-1 min-h-screen mx-auto pb-12 px-4 sm:px-6 lg:px-8">
            <h1 class="text-4xl leading-9 font-bold">Your Info</h1>
            <div class="grid md:grid-cols-2 gap-4 mt-6">
                <div class="rounded-md bg-white shadow shadow-sm  px-5 py-8">
                    <h2 class="text-3xl font-bold mb-3">Login Info</h2>
                    <form method="post" action="/dashboard/info/update">
                        @method('PATCH')
                        @csrf
                        @include('.partials.forms.form_errors')
                        <label for="name">Your Name</label>
                        <input class="input" id="name" name="name" required value="{{$user->name}}">
                        <label for="email">Email</label>
                        <input class="input" id="email" name="email" required value="{{$user->email}}">
                        <button type="submit" class="btn btn-cta">Update</button>
                    </form>
                </div>

                @if($user->is_subscribed == 0)
                    <div class="rounded-md bg-white shadow shadow-sm shadow-md px-5 py-8">
                        <h2 class="text-3xl font-bold mb-3">Subscribe to Updates</h2>
                        <p class="mb-4">Subscribe to updates from MyJourney to keep up to date.</p>
                        <form method="post" action="/newsletter">
                            @csrf
                            <button type="submit" class="btn btn-cta">Subscribe</button>
                        </form>
                    </div>
                    @else
                    <div class="rounded-md bg-white shadow shadow-sm px-5 py-8">
                        <h2 class="text-3xl font-bold mb-3">Updates</h2>
                        <p class="mb-4">Sweet. You are subscribed to updates, so you will stay current with what happens at MyJourney.</p>
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
