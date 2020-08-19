<div class="lg:max-w-screen-lg prose prose-lg px-4 text-gray-500 mx-auto">
    @can('update', $journey)
        <journey-intro-component :journey="{{$journey}}"></journey-intro-component>
    @else
        <h1>@if(! $steps->onFirstPage()) <span class="font-bold">Page {{$steps->currentPage()}} of: </span> @endif{{$journey->title}}
        </h1>
        <p class="whitespace-pre-wrap">{{$journey->introduction}}</p>
    @endcan
    <h3>by {{$journey->author}}</h3>
</div>

