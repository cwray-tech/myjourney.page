@extends('layouts.app')
@section('page_title')
    About MyJourney
@endsection

@section('content')
    <section class="mt-10 mx-auto max-w-screen-xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 xl:mt-28">
        <div class="text-center">
            <h1 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-900 sm:text-5xl sm:leading-none md:text-6xl">
                About
                <br class="xl:hidden">
                <span class="text-yellow-600">MyJourney</span>
            </h1>
        </div>
    </section>
    <div class="relative py-16  overflow-hidden lg:mb-16">
        <div class="relative px-4 sm:px-6 lg:px-8">

            <div class="prose prose-lg text-gray-500 mx-auto">
                <p>12:46 am- I was just accepted into a bachelors program to study software development.</p>
                <p>It had been a long journey so far.
                    God had brought me through a lot of interesting experiences and setbacks to bring me there. I
                    thought,
                    I want to share my journey towards software development. Maybe it can help someone else.</p>
                <p>I thought about only making it about me, but then I realized, maybe others would like to share their
                    journeys too. Maybe there is more than one journey they would like to share with their family,
                    friends, a future employer..</p>

                <p>Maybe people dream of taking a journey, and they've never shared it. Maybe people could share
                    stories of journeys that they've never taken, but are in their dreams.</p>
                <p>That is when I knew I needed to give others the opportunity to share their journeys too. That is when I
                    began working on this app. That is why this exists.</p>
            </div>
        </div>
    </div>
@endsection
