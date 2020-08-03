@extends('layouts.app')
@section('page_title')
    Edit this Step
@endsection
@section('content')
    <section class="py-40">
        <div class="container px-6 mx-auto md:flex flex-row-reverse justify-between">
            <div class="md:w-2/3 md:pl-6">
                <h1 class="text-5xl mb-3"><span class="font-bold">Edit Step:</span> {{ $step->title }}</h1>
                <form class="mt-6" method="post" action="{{route('steps.update', $step->id )}}" enctype="multipart/form-data">
                    @csrf
                    @method('PATCH')
                    @include('.partials.forms.form_errors')
                    <label for="title">Step Title*</label>
                    <input name="title" class="input" id="title" autocomplete="off" type="text"
                           value="{{ $step->title }}" placeholder="eg. My Journey to Become Software Developer">
                    <label for="picture">Step Photo (Optional)</label>
                    @if($step->picture)
                        <img class="rounded w-40" src="{{$step->picture_path}}">
                    @endif
                    <input name="picture" id="picture" class="input" accept="image/*" type="file">

                    <div class="flex">
                        <div class="w-1/2">
                            <label for="date">Approximate Date</label>
                            <input name="date" class="input" id="date" autocomplete="off" type="date"
                                   value="@if($step->date){{$step->date->format('yy-m-d')}}@endif">
                        </div>
                        <div class="w-1/2 pl-3">
                            <label for="time">Approximate Time (Optional)</label>
                            <input name="time" class="input" id="time" autocomplete="off" type="time"
                                   value="{{ $step->time }}">
                        </div>
                    </div>


                    <label for="description">Description*</label>
                    <textarea rows="10" class="input" autocomplete="off" name="description" id="description"
                              placeholder="Describe what happened at this part of your journey and how it helped you on your path.">{{ $step->description }}</textarea>
                    <button type="submit" class="btn btn-primary">Save Changes to Step</button>
                </form>
            </div>
            @include('.partials.journeys.edit_sidebar')
        </div>

    </section>
@endsection
