@forelse($journeys as $journey)
    <a href="{{ route('journeys.show', $journey->slug) }}" target="_blank" class="rounded-md md:flex items-stretch justify-start w-full shadow-sm overflow-hidden border hover:shadow-md transition ease-in-out duration-150">
        @if($journey->picture)
            <div class="md:w-1/4 max-h-80 overflow-hidden">
                <img src="{{$journey->picture_path}}" class="object-cover w-full h-full" alt="{{$journey->title}}">
            </div>

        <div class=" md:w-3/4 p-6 pb-8 flex flex-col justify-center items-start">
            <h2 class="text-4xl mb-3">{{ $journey->title }}</h2>
            <p class="mb-4">{{ $journey->intro_preview }}</p>
            <button class="btn btn-cta">Read Journey</button>
        </div>
            @else
            <div class="p-6 pb-8 flex flex-col justify-center items-start">
                <h2 class="text-4xl mb-3">{{ $journey->title }}</h2>
                <p class="mb-4">{{ $journey->intro_preview }}</p>
                <button class="btn btn-cta">Read Journey</button>
            </div>
        @endif
    </a>
@empty
    <div class="col-span-3 px-8 text-center">Bummer. We don't have any journeys here to share yet, but come back soon to start reading journeys, or <a href="/register" class="underline"> create your own account</a> to start writing your journeys!</div>
@endforelse
