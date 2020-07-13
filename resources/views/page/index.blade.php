@extends('layouts.app')

@section('page_title')
    Share Your Journey
@endsection

@section('content')
<section class="py-40 min-h-screen justify-center flex flex-col items-center">
    <div class="container px-4 text-center mx-auto">
        <div>
            <h1 class="text-5xl">You have a journey.</h1>
        </div>

    </div>
</section>
<section class="py-40 min-h-screen justify-center flex flex-col items-center">
    <div class="container px-4 text-center mx-auto">
        <div>
            <h2 class="text-5xl">Your business has a journey.</h2>
        </div>

    </div>
</section>
<section class="py-40 min-h-screen justify-center flex flex-col items-center">
    <div class="container px-4 text-center mx-auto">
        <div>
            <h2 class="text-5xl">You dream of taking a journey.</h2>
        </div>

    </div>
</section>
<section class="py-40 min-h-screen justify-center flex flex-col items-center">
    <div class="container px-4 text-center mx-auto">
        <div>
            <h2 class="text-5xl mb-12">You can share your journeys with the world.</h2>
            <a class="btn btn-cta" href="/register">Start Sharing your Journeys.</a>
        </div>

    </div>
</section>
@endsection
