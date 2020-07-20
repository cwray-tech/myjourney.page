@extends('layouts.app')
@section('page_title')
    Add a Moment
@endsection
@section('content')
    <section class="py-40">
        <div class="container px-6 mx-auto md:flex flex-row-reverse justify-between">
            <div class="md:w-2/3 md:pl-6">
                <h1 class="text-5xl mb-3">Add a Moment to your Journey</h1>
                <form class="mt-6" method="post" action="{{route('journeys.steps.index', $journey->slug )}}">
                    @csrf
                    @include('.partials.forms.form_errors')
                    <label for="title">Moment Title</label>
                    <input name="title" class="input" id="title" autocomplete="off" type="text"
                           value="{{ old('title') }}" placeholder="eg. My Journey to Become Software Developer">
                    <div class="flex">
                        <div class="w-1/2">
                            <label for="date">Approximate Date</label>
                            <input name="date" class="input" id="date" autocomplete="off" type="date"
                                   value="{{ old('date') }}">
                        </div>
                        <div class="w-1/2 pl-3">
                            <label for="time">Approximate Time</label>
                            <input name="time" class="input" id="time" autocomplete="off" type="time"
                                   value="{{ old('time') }}">
                        </div>
                    </div>


                    <label for="description">Description</label>
                    <textarea rows="10" class="input" autocomplete="off" name="description" id="description"
                              placeholder="Describe what happened at this part of your journey and how it helped you on your path.">{{ old('description') }}</textarea>
                    <button type="submit" class="btn btn-primary">Add Moment</button>
                </form>
            </div>
            <div class="lg:pr-6 md:w-1/3 pt-4 p-4 border rounded md:mt-4 mt-8 max-h-screen overflow-auto">
                <h2 class="text-3xl pb-2 border-b border-black mb-6 sticky top-0 bg-white">Your Journey</h2>
                <label>Journey Title</label>
                <h3 class="text-2xl">{{ $journey->title }}</h3>
                <label class="mt-6">Journey Introduction</label>
                <p class="">{{ $journey->introduction }}</p>
                <div class="mt-6">
                    <h2 class="text-3xl pb-2 border-b border-black mb-4">Journey Moments</h2>
                    <ul>
                        @forelse($journey->steps as $step)
                            <li>
                                <a href="{{ route('steps.edit', $step->id) }}" class="p-2 block border hover:border-black transition ease-in-out duration-150 rounded mb-2">
                                    <h3 class="text-2xl">{{$step->title}}</h3>
                                    <h4>{{ $journey->date }}</h4>
                                </a>
                            </li>

                        @empty
                            <p class="bg-blue-500 p-4 rounded text-white mt-6">Add the first step you took down this journey, or
                                the first step you dream of taking.</p>
                        @endforelse
                    </ul>

                </div>
            </div>
        </div>

    </section>
@endsection
