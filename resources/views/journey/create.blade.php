@extends('layouts.app')
@section('page_title')
    Write your Journey
@endsection
@section('content')
    <section class="py-40">
        <div class="container px-6 max-w-screen-lg mx-auto">
            <h1 class="text-5xl mb-3">Start Writing your Journey</h1>
            <form class="mt-6" method="post" action="/journeys" enctype="multipart/form-data">
                @csrf
                @include('.partials.forms.form_errors')
                <label for="title">Journey Title</label>
                <input name="title" class="input" id="title" autocomplete="off" type="text"
                       value="{{ old('title') }}" placeholder="eg. My Journey to Become Software Developer">
                <label for="picture">Journey Photo</label>
                <input name="picture" id="picture" class="input" accept="image/*" type="file"
                       value="{{ old('picture') }}" >
                <label for="introduction">Journey Introduction</label>
                <textarea rows="10" class="input" autocomplete="off" name="introduction" id="introduction"
                          placeholder="You can enter anything here, but this serves as an introduction to your journey at the top of your journey page.">{{ old('introduction') }}</textarea>
                <button type="submit" class="btn btn-primary">Begin Sharing</button>
            </form>
        </div>

    </section>
@endsection
