@extends('layouts.app')
@section('page_title')
    Edit Journey Introduction
@endsection

@section('content')
    <section class="py-40">
        <div class="container px-6 mx-auto md:flex flex-row-reverse justify-between">
            <div class="md:w-2/3 md:pl-6">
                <h1 class="text-5xl mb-3"><span class="font-bold">Edit Intro:</span> {{ $journey->title }}</h1>
                <form class="mt-6" method="post" enctype="multipart/form-data"
                      action="{{route('journeys.update', $journey->slug)}}">
                    @csrf
                    @method('patch')
                    @include('.partials.forms.form_errors')
                    <label for="title">Journey Title</label>
                    <input name="title" class="input" id="title" autocomplete="off" type="text"
                           value="{{ $journey->title }}" placeholder="eg. My Journey to Become Software Developer">
                    <label for="picture">Journey Photo</label>
                    @if($journey->picture)
                    <img class="rounded w-40" src="{{$journey->picture}}">
                    @endif
                    <input name="picture" id="picture" class="input" accept="image/*" type="file">
                    <label for="introduction">Journey Introduction</label>
                    <textarea rows="10" class="input" autocomplete="off" name="introduction"
                              id="introduction"
                              placeholder="You can enter anything here, but this serves as an introduction to your journey at the top of your journey page.">{{ $journey->introduction }}</textarea>
                    <button type="submit" class="btn btn-primary">Update Journey Info</button>
                </form>
            </div>
            @include('.partials.journeys.edit_sidebar')
        </div>
    </section>
@endsection
