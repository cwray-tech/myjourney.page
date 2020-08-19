<div class="rounded-md bg-white shadow-sm shadow p-4 mb-6">
    <div class="w-full grid lg:grid-cols-5 gap-4">
        @if($journey->picture)
            <div class="h-64 flex justify-center items-center">
                <img src="{{$journey->picture_path}}" class="w-full h-full object-cover rounded">
            </div>
        @endif
        <div class="lg:col-span-3">
            <h2 class="text-4xl font-bold mb-3">{{ $journey->title }}</h2>
            <p>{{ $journey->introduction }}</p>
        </div>
        <div class="col-span-1 lg:col-start-5 flex lg:flex-col lg:items-end justify-start flex-wrap lg:text-right">
            <div class="w-full flex items-center lg:justify-end flex-wrap mb-2">
                <a target="_blank" href="{{route('journeys.show', $journey->slug)}}"
                   class="icon-button my-1 mr-1"><img class="w-4 mr-2" src="/images/external.svg"> View</a>
                <a href="{{route('journeys.edit', $journey->slug)}}" class="icon-button my-1 mr-1"><img
                        class="w-4 mr-2" src="/images/edit.svg">Edit</a>
                <a href="{{route('journeys.steps.create', $journey->slug)}}" class="icon-button my-1 mr-1"><img
                        class="w-4 mr-2" src="/images/add.svg">Add Steps</a>
                <modal-component>
                    <template v-slot:header>Are you sure you want to delete this Journey?</template>
                    <template v-slot:opener>
                        <div class="icon-button my-1 mr-1 border-yellow-500">
                            <img class="w-4 mr-2" src="/images/bin.svg">Delete Journey
                        </div>
                    </template>
                    <form  v-cloak class="" method="post"
                           action="{{ route('journeys.destroy', $journey->slug) }}">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Yes, Delete Journey</button>
                    </form>
                </modal-component>
            </div>
            <publish-journey-component :journey="{{ $journey }}"></publish-journey-component>
            <make-public-component :journey="{{ $journey }}"></make-public-component>

        </div>
    </div>

</div>
