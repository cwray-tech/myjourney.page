<div id="{{ $step->id }}"
     class="md:flex odd:flex-row-reverse justify-center flex-row items-center py-16 pl-6 md:pl-0">
    @if($step->picture)
        <div class="md:w-1/3 mx-auto">
            <img
                class="w-full rounded-md rounded-r-none shadow shadow-sm  md:rounded-r "
                alt="{{ $step->title }}" src="{{ $step->picture_path }}">

        </div>
    @endif
    <div
        class="relative bg-white border  rounded-md journey-step-content px-6 py-10 rounded-r-none md:rounded-r">
        @if($step->time)
            <div class="text-3xl leading-6 mb-6">{{ $step->formattedTime() }} </div>
        @endif
        @can('update', $journey)
            <journey-step-update-component :step="{{$step}}"></journey-step-update-component>
        @else
            <h2 class="mb-4 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">{{ $step->title }}</h2>

            <p class="whitespace-pre-wrap text-gray-500 mx-auto">{{ $step->description }}</p>
        @endcan
        <div class="text-lg font-bold text-gray-600 mt-3">
            {{ $step->formatted_date }}
        </div>
    </div>

</div>
