@extends('layouts.page')
@section('page_title')
    {{ $page->title }}
@endsection

@section('page_description')
    {{ $page->introduction }}
@endsection

@section('page_image'){{ $page->picture ? $page->picture_path : "https://myjourney.page/images/my-journey-open-graph-image.jpg" }}@endsection

@section('content')
    @if($page->picture)
        <section class="md:flex min-h-screen items-stretch bg-gray-50">
            <div class="md:w-1/3 overflow-hidden flex items-stretch flex-grow">
                <img class="object-cover w-full h-full" alt="{{ $page->title }}"
                     src="{{ $page->picture_path }}">
            </div>
            <div class="py-16 md:w-2/3 lg:p-20 w-full flex flex-col items-start justify-center">
                <h1>{{ $page->title }}</h1>

            </div>

        </section>
    @else
        <section class="py-16 min-h-screen justify-center flex flex-col items-center">
            <h1>{{ $page->title }}</h1>
        </section>

    @endif
    @can('update', $page)

    @endcan
@endsection
