@extends('layouts.app')
@section('page_title')
    Add a Step
@endsection
@section('page_title')
    Add Step on Journey
@endsection
@section('content')
    <section class="py-40">
        <div class="container px-6 mx-auto md:flex flex-row-reverse justify-between">
            <div class="md:w-2/3 md:pl-6">
                <h1 class="text-5xl mb-3">Add a Step you took on your Journey</h1>
                <form class="mt-6" method="post" action="{{route('journeys.steps.index', $journey->slug )}}">
                    @csrf
                    @include('.partials.forms.form_errors')
                    <label for="title">Step Title*</label>
                    <input name="title" class="input" id="title" autocomplete="off" type="text"
                           value="{{ old('title') }}" placeholder="eg. My Journey to Become Software Developer">
                    <div class="flex">
                        <div class="w-1/2">
                            <label for="date">Approximate Date*</label>
                            <input name="date" class="input" id="date" autocomplete="off" type="date"
                                   value="{{ old('date') }}">
                        </div>
                        <div class="w-1/2 pl-3">
                            <label for="time">Approximate Time</label>
                            <input name="time" class="input" id="time" autocomplete="off" type="time"
                                   value="{{ old('time') }}">
                        </div>
                    </div>


                    <label for="description">Description*</label>
                    <textarea rows="10" class="input" autocomplete="off" name="description" id="description"
                              placeholder="Describe what happened at this part of your journey and how it helped you on your path.">{{ old('description') }}</textarea>
                    <button type="submit" class="btn btn-primary">Add Step to Journey</button>
                </form>
            </div>
            @include('.partials.journeys.edit_sidebar')
        </div>

    </section>
@endsection
