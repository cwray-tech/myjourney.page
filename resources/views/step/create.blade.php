@extends('layouts.app')
@section('page_title')
    Add a Step
@endsection
@section('page_title')
    Add Step on Journey
@endsection
@section('content')
    @component('.partials.journeys._journey_edit_container', ['journey' => $journey])
        @slot('content')
            <h1 class="text-4xl font-bold leading-9 mb-3">Add a step you took on your Journey</h1>
            <form class="mt-6" method="post" action="{{route('journeys.steps.index', $journey->slug )}}"
                  enctype="multipart/form-data">
                @csrf
                @include('.partials.forms.form_errors')
                <label for="title">Step Title*</label>
                <input name="title" class="input" id="title" autocomplete="off" type="text"
                       value="{{ old('title') }}" placeholder="eg. I started school at Harvard.">
                <label for="picture">Step Photo (Optional)</label>
                <div class="p-2 bg-gray-200 rounded-md text-sm mb-2">Photo must be less than 4MB.</div>
                <input name="picture" id="picture" class="input" accept="image/*" type="file">
                <div class="flex">
                    <div class="w-1/2">
                        <label for="date">Approximate Date*</label>
                        <input name="date" class="input" id="date" autocomplete="off" type="date"
                               value="{{ old('date') }}">
                    </div>
                    <div class="w-1/2 pl-3">
                        <label for="time">Approximate Time (Optional)</label>
                        <input name="time" class="input" id="time" autocomplete="off" type="time"
                               value="{{ old('time') }}">
                    </div>
                </div>


                <label for="description">Description*</label>
                <textarea rows="6" class="input" autocomplete="off" name="description" id="description"
                          placeholder="Describe what happened at this part of your journey and how it helped you on your path.">{{ old('description') }}</textarea>
                <button type="submit" class="btn btn-primary">Add Step to Journey</button>
            </form>
        @endslot
    @endcomponent
@endsection
