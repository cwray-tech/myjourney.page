@extends('layouts.app')
@section('page_title')
    Add Steps
@endsection
@section('content')
    <section class="py-40">
        <div class="container px-6 mx-auto">
            <h1 class="text-5xl mb-3">Add a step you took on your Journey</h1>
            <form class="mt-6" method="post" action="{{route('journeys.steps.index', $journey->slug )}}">
                @csrf
                @include('.partials.forms.form_errors')
                <label for="title">Step Title</label>
                <input name="title" class="input" id="title" autocomplete="off" type="text"
                       value="{{ old('title') }}" placeholder="eg. My Journey to Become Software Developer">
                <label for="date">Approximate Date & Time of Step</label>
                <input name="date" class="input" id="date" autocomplete="off" type="datetime-local"
                       value="{{ old('date') }}">

                <label for="description">Description</label>
                <textarea rows="10" class="input" autocomplete="off" name="description" id="description"
                          placeholder="Describe what happened at this part of your journey and how it helped you on your path.">{{ old('description') }}</textarea>
                <button type="submit" class="btn btn-primary">Add Step</button>
            </form>
        </div>

    </section>
@endsection
