@can('update', $journey)
    <journey-intro-component :journey="{{$journey}}"></journey-intro-component>
@else
    <h1 class="mt-2 mb-8 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">@if(! $steps->onFirstPage())
            <span class="font-bold">Page {{$steps->currentPage()}} of: </span>@endif{{$journey->title}}
    </h1>
    <p class="whitespace-pre-wrap text-lg text-gray-500 mx-auto">{{$journey->introduction}}</p>
@endcan
<div class="text-lg font-bold text-gray-600 mt-3">by {{$journey->author}}</div>
