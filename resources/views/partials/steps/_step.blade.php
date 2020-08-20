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
        class="relative bg-white border-2 border-black border-r-none md:border-r-2 rounded-md px-4 py-8 journey-step-content rounded-r-none md:rounded-r">
        <div class="prose prose-lg text-gray-500">
            @if($step->time)
                <h3>{{ $step->formattedTime() }} </h3>
            @endif
            @can('update', $journey)
                <journey-step-update-component :step="{{$step}}"></journey-step-update-component>
            @else
                <h2>{{ $step->title }}</h2>

                <p class="whitespace-pre-wrap">{{ $step->description }}</p>
            @endcan
            <h4>{{ $step->formatted_date }}</h4>
        </div>



    </div>

</div>
