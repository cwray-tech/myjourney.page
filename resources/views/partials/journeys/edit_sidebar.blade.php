<div class="sticky top-10 lg:pr-6 md:w-1/3 py-4 px-4 bg-white shadow rounded md:mt-0 mt-8 max-h-100 overflow-auto no-scrollbar">
    <h2 class="text-2xl font-bold pb-2 pt-4 border-b border-yellow-500 mb-4 sticky top-0 bg-white">Your Journey
        <a target="_blank" href="{{route('journeys.show', $journey->slug)}}" class="icon-button text-sm mb-1 ml-4">
            <img class="w-4 mr-2" src="/images/external.svg">View</a>
        <a href="{{route('journeys.edit', $journey->slug)}}" class="icon-button text-sm mb-1">
            <img class="w-4 mr-2" src="/images/edit.svg">Edit</a>
    </h2>
    <div class="px-1">
        <h3 class="font-bold mb-2">Journey Title</h3>
        <h4 class="text-2xl">{{ $journey->title }}</h4>
        <h3 class="mt-4 font-bold mb-2">Journey Introduction</h3>
        <p class="">{{ \Illuminate\Support\Str::limit(strip_tags($journey->introduction),150,'...')}}</p>
    </div>

    <div class="mt-6">
        <h2 class="text-2xl font-bold pb-2 border-b border-yellow-500 mb-4">Journey Steps</h2>
        <div class="mb-6">
            @forelse($journey->steps as $step)
                <div
                    class="px-2 pl-4 py-4 lg:flex items-center justify-between border rounded mb-2">
                    <div class="lg:w-3/4">
                        <h3 class="text-lg">{{$step->title}}</h3>
                        @if($step->date)
                            <h4>{{ date('F, Y', strtotime($step->date)) }}</h4>
                        @endif
                    </div>
                    <div class="flex lg:flex-col lg:items-end items-center justify-between mt-2 lg:mt-0">
                        <a href="{{ route('steps.edit', $step->id) }}" class="flex underline items-center lg:mb-2">
                            <img class="w-4 h-4 mr-2" src="/images/edit.svg">
                            <div>Edit</div>
                        </a>
                        <modal-component>
                            <template v-slot:header>Are you sure you want to delete this step on your journey?
                            </template>
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
{{--
<div class="container fixed top-10 px-4">
    <div class="container mx-auto px-6 flex">
        <a href="{{ route('journeys.steps.create', $journey->slug) }}" class="icon-button bg-white ml-auto">
            <img src="/images/add.svg" class="w-4 mr-2">
            <div>Add Step to Journey</div>
        </a>
    </div>
</div>
--}}

