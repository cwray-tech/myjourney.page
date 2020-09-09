@extends('layouts.app')

@section('page_title')
    Share Your Journey
@endsection

@section('content')
    <section class="lg:relative">
        <div class="mx-auto max-w-7xl w-full pt-16 pb-20 text-center lg:py-48 lg:text-left">
            <div class="px-4 lg:w-1/2 sm:px-8 xl:pr-16">
                <h1 class="text-4xl tracking-tight leading-10 font-extrabold text-gray-800 sm:text-5xl sm:leading-none md:text-6xl lg:text-5xl xl:text-6xl">
                    Your Journey
                    <br class="xl:hidden">
                    <span class="text-yellow-500">Matters.</span>
                </h1>
                <p class="mt-3 max-w-md mx-auto text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl">
                    MyJourney is the place where you can write and share your journeys, and make a difference in a life.
                </p>
                <div class="mt-10 flex flex-col sm:flex-row justify-center lg:justify-start">
                    <div class="rounded-md shadow">
                        <a href="/register"
                           class="btn btn-primary py-3 px-8">
                            Get started
                        </a>
                    </div>
                    <div class="mt-3 rounded-md shadow sm:mt-0 sm:ml-3">
                        <a href="/journeys"
                           class="btn py-3 px-8">
                            Read Journeys
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="relative w-full h-64  sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 lg:h-full">
            <img class="absolute inset-0  w-full h-full object-cover"
                 src="/images/journey.JPG"
                 alt="On a Journey">
        </div>
    </section>

    <div class="py-16 bg-white overflow-hidden lg:py-24">
        <div class="relative max-w-xl mx-auto px-4 sm:px-6 lg:px-8 lg:max-w-screen-xl">
            <div class="relative">
                <h2 class="text-center text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                    Share your Journey
                </h2>
            </div>

            <div class="relative mt-12 lg:mt-24 lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                <div class="relative">
                    <h3 class="text-2xl leading-8 font-extrabold text-gray-900 tracking-tight sm:text-3xl sm:leading-9">
                        In bite sized steps.
                    </h3>
                    <p class="mt-3 text-lg leading-7 text-gray-500">
                        Add and remove steps in your journey as you progress through it, and let others know about the life events that made you who you are today.
                    </p>

                    {{-- <ul class="mt-10">
                        <li>
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-yellow-400 text-white">
                                       <img class="h-6 w-6" src="/images/calendar.svg" alt="date">
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg leading-6 font-medium text-gray-900">Each step on your journey
                                        has a date.</h4>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Each step will automatically sort based on the date it happened, making your
                                        timeline in chronological order.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="mt-10">
                            <div class="flex">
                                {{--<div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-yellow-400 text-white">
                                        <img class="h-6 w-6" src="/images/past.svg" alt="time">
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg leading-6 font-medium text-gray-900">You can add a time too.</h4>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        When you woke up that one time at 2 in the morning,
                                        and that was when the life changing idea happened, share when it changed your journeys course.
                                    </p>
                                </div>
                            </div>
                        </li>
                        <li class="mt-10">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-center h-12 w-12 rounded-md bg-yellow-400 text-white">
                                        <img class="h-6 w-6" src="/images/flag.svg" alt="date">
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-lg leading-6 font-medium text-gray-900">Your journeys don't have to
                                        end.</h4>
                                    <p class="mt-2 text-base leading-6 text-gray-500">
                                        Most of us are still in the middle of a journey, and that is okay. Just add a
                                        step at the end of your journey, and let your friends know you will be adding
                                        more as time goes on.
                                    </p>
                                </div>
                            </div>
                        </li>
                    </ul> --}}
                </div>

                <div class="mt-10 -mx-4 relative lg:mt-0">
                    <img class="relative mx-auto sm:rounded-md shadow shadow-md" width="490"
                         src="/images/man-on-journey-share-journey-timeline.jpg" alt="Step on a journey">
                </div>
            </div>


            <div class="relative mt-12 sm:mt-16 lg:mt-24">
                <div class="lg:grid lg:grid-flow-row-dense lg:grid-cols-2 lg:gap-8 lg:items-center">
                    <div class="lg:col-start-2">
                        <h3 class="text-2xl leading-8 font-extrabold text-gray-900  sm:text-3xl sm:leading-9">
                            Creating empathy.
                        </h3>
                        <p class="mt-3 text-lg leading-7 text-gray-500">
                            Your journey can be anything because what matters is how we share our journeys so we can help others on theirs.
                        </p>
                        {{--
                        <ul class="mt-10">
                            <li>
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="flex items-center justify-center h-12 w-12 rounded-md bg-yellow-400 text-white">
                                            <img class="h-6 w-6" src="/images/confidential.svg" alt="secret">
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg leading-6 font-medium text-gray-900">Your secret.</h4>
                                        <p class="mt-2 text-base leading-6 text-gray-500">
                                            You can write about that one event that you have never shared with anyone.
                                            Make it anonymous if you want it to be and no one will ever know that this
                                            was your story.
                                        </p>
                                    </div>
                                </div>
                            </li>
                            <li class="mt-10">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <div
                                            class="flex items-center justify-center h-12 w-12 rounded-md bg-yellow-400 text-white">
                                            <img class="h-6 w-6" src="/images/fairy-tale.svg" alt="fairy tale">
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h4 class="text-lg leading-6 font-medium text-gray-900">Your untold novel.</h4>
                                        <p class="mt-2 text-base leading-6 text-gray-500">
                                            Want to tell a journey that never happened? That is totally cool. Share your
                                            story on a timeline and let people decide for themselves what they think.
                                            (or tell them at the end).
                                        </p>
                                    </div>
                                </div>
                            </li>
                        </ul> --}}
                    </div>

                    <div class="mt-10 -mx-4 relative lg:mt-0 lg:col-start-1">
                        <img class="relative mx-auto sm:rounded-md shadow shadow-md" width="490"
                             src="/images/share-journey-help-others.jpg" alt="Cyborg Attack Journey">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-white">
        <div class="max-w-screen-xl mx-auto text-center py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <h2 class="text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">
                Change a life.
                <br>
                Share a journey.
            </h2>
            <div class="mt-8 flex justify-center">
                <div class="inline-flex rounded-md shadow">
                    <a href="/register" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-white bg-yellow-500 hover:bg-yellow-400 focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                        Get started
                    </a>
                </div>
                <div class="ml-3 inline-flex">
                    <a href="/about" class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base leading-6 font-medium rounded-md text-yellow-700 bg-yellow-100 hover:text-yellow-600 hover:bg-yellow-50 focus:outline-none focus:shadow-outline focus:border-yellow-300 transition duration-150 ease-in-out">
                        Learn more
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection
