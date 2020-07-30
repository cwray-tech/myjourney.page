<div class="sticky top-10 lg:pr-6 md:w-1/3 pt-0 px-4 border rounded md:mt-0 mt-8 max-h-80 overflow-auto no-scrollbar">
    <h2 class="text-3xl pb-2 pt-4 border-b border-black mb-4 sticky top-0 bg-white">Your Journey <a
            class="text-lg underline" target="_blank" href="{{ route('journeys.show', $journey->slug) }}">View</a> <a
            class="text-lg underline" href="{{ route('journeys.edit', $journey->slug) }}">Edit Intro</a></h2>
    <div class="px-1">
        <label>Journey Title</label>
        <h3 class="text-2xl">{{ $journey->title }}</h3>
        <label class="mt-4">Journey Introduction</label>
        <p class="">{{ $journey->introduction }}</p>
    </div>

    <div class="mt-6">
        <h2 class="text-3xl pb-2 border-b border-black mb-4">Journey Steps</h2>
        <div class="mb-6">
            @forelse($journey->steps as $step)
                <div
                   class="px-2 pl-4 py-4 flex items-center justify-between border rounded mb-2">
                    <div>
                        <h3 class="text-lg">{{$step->title}}</h3>
                        @if($step->date)
                            <h4>{{ date('F, Y', strtotime($step->date)) }}</h4>
                        @endif
                    </div>
                    <div class="flex flex-col items-end">
                        <a href="{{ route('steps.edit', $step->id) }}" class="flex underline items-center mb-2">
                            <img class="w-4 h-4 mr-2" src="/images/edit.svg">
                            <div>Edit</div>
                        </a>
                        <modal-component>
                            <template v-slot:header>Are you sure you want to delete this step on your journey?</template>
                            <template v-slot:opener>
                                <div class="flex underline items-center">
                                    <img class="w-4 mr-2" src="/images/bin.svg">Delete
                                </div>

                            </template>
                            <form class="mt-2" method="post"
                                  action="{{ route('steps.destroy', $step->id) }}">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger">Yes, Delete Step</button>
                            </form>
                        </modal-component>
                    </div>

                </div>
            @empty
                <p class="bg-black p-4 rounded text-white">Add the first step you took down this journey, or
                    the first step you dream of taking.</p>
            @endforelse
        </div>
        <a href="{{ route('journeys.steps.create', $journey->slug) }}" class="icon-button sticky bg-white bottom-0">
            <img src="/images/add.svg" class="w-4 mr-2">
            <div>Add Step to Journey</div>
        </a>

    </div>
</div>
