@extends('layouts.app')
@section('page_title')
    Learn
@endsection

@section('content')
    <section class="py-16 min-h-screen justify-center flex flex-col items-center">
        <div class="container px-8 md:flex md:flex-row-reverse md:align-items-center mx-auto">
            <img class="md:w-1/4 w-1/2" src="/images/devjourney.svg" alt="Dev journey">

            <div class="md:pr-16 md:pt-0 pt-5 rich-text">
                <h1 class="text-5xl mb-3">12:46 am</h1>
                <p>I was just accepted to a bachelors program to study software development.</p>
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
    </section>
@endsection
