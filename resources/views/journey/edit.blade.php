@extends('layouts.app')
@section('page_title')
    Edit Journey Introduction
@endsection

@section('content')
    @component('.partials.journeys._journey_edit_container', [ 'journey' => $journey])
        @slot('content')
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
                    <img class="rounded w-40" src="{{$journey->picture_path}}">
                @endif
                <input name="picture" id="picture" class="input" accept="image/*" type="file">
                <label for="introduction">Journey Introduction</label>
                <textarea rows="6" class="input" autocomplete="off" name="introduction"
                          id="introduction"
                          placeholder="You can enter anything here, but this serves as an introduction to your journey at the top of your journey page.">{{ $journey->introduction }}</textarea>
                <button type="submit" class="btn btn-primary">Update Journey Info</button>
            </form>
        @endslot
    @endcomponent
@endsection
