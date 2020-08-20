<div class="rounded-md bg-white border shadow shadow-sm mb-4">
    <div class="w-full grid lg:grid-cols-6">
        @if($journey->picture)
            <div class="flex justify-center items-center h-full max-h-1/2">
                <img src="{{$journey->picture_path}}" class="w-full h-full object-cover rounded-md">
            </div>
        <div class="lg:col-span-3 md:p-6 p-4">
            <h2 class="mb-4 text-3xl leading-8 font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">{{ $journey->title }}</h2>
            <p class="leading-5 text-gray-500">{{ $journey->intro_preview }}</p>
        </div>
        @else
            <div class="lg:col-span-4 md:p-6 p-4">
                <h2 class="mb-4 text-3xl leading-8 font-bold tracking-tight text-gray-900 sm:text-4xl sm:leading-10">{{ $journey->title }}</h2>
                <p class="leading-5 text-gray-500">{{ $journey->intro_preview }}</p>
            </div>
        @endif
        <div class="md:p-6 p-4 col-span-1 lg:col-start-5 lg:col-span-2 flex lg:flex-col lg:items-end justify-start flex-wrap lg:text-right">
            <div class="w-full flex items-center lg:justify-end flex-wrap mb-2">

                <a target="_blank" href="{{route('journeys.show', $journey->slug)}}"
                   class="icon-button my-1 mr-1">
                    <img class="w-4 mr-2" src="/images/external.svg"> View</a>

                <a href="{{route('journeys.edit', $journey->slug)}}" class="icon-button my-1 mr-1"><img
                        class="w-4 mr-2" src="/images/edit.svg">Edit</a>

                <a href="{{route('journeys.steps.create', $journey->slug)}}" class="icon-button my-1 mr-1"><img
                        class="w-4 mr-2" src="/images/add.svg">Add Steps</a>

                <modal-component>

                    <template v-slot:opener>
                        <div class="icon-button my-1 mr-1 border-yellow-500">
                            <img class="w-4 mr-2" src="/images/bin.svg">Delete Journey
                        </div>
                    </template>

                    <template v-slot:header>Are you sure you want to delete this Journey?</template>

                    <template v-slot:content>
                        Once a journey is deleted, it is completely removed and there is no way of getting it back.
                    </template>

                    <template v-slot:action>
                        <form  v-cloak class="flex w-full rounded-md shadow-sm sm:w-auto" method="post"
                               action="{{ route('journeys.destroy', $journey->slug) }}">
                            @method('delete')
                            @csrf
                            <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">Yes, Delete Journey</button>
                        </form>
                    </template>

                </modal-component>
            </div>
            <publish-journey-component :journey="{{ $journey }}"></publish-journey-component>
            <make-public-component :journey="{{ $journey }}"></make-public-component>

        </div>
    </div>
</div>
