<div class="sticky top-0 border sidebar lg:pr-6 md:w-1/3 px-4 bg-white rounded-md md:mt-0 mt-8 max-h-screen overflow-auto transition-all ease-in-out duration-300">
    <h2 class="text-2xl font-bold pb-2 pt-8 border-b border-yellow-500 mb-4 sticky top-0 bg-white">Your Journey</h2>
    <div class="flex items-center flex-wrap justify-between mb-4">
        <a target="_blank" href="{{route('journeys.show', $journey->slug)}}" class="icon-button text-sm mb-1">
            <img class="w-4 mr-2" src="/images/external.svg">View and live edit</a>
        <a href="{{route('journeys.edit', $journey->slug)}}" class="icon-button text-sm mb-1">
            <img class="w-4 mr-2" src="/images/edit.svg">Edit Introduction</a></div>
    <div class="px-1">
        <h3 class="font-bold mb-2">Journey Title</h3>
        <h4 class="text-2xl">{{ $journey->title }}</h4>
        <h3 class="mt-4 font-bold mb-2">Journey Introduction</h3>
        <p class="">{{ $journey->intro_preview }}</p>

    </div>

    <div class="mt-6">
        <h2 class="text-2xl font-bold pb-2 border-b border-yellow-500 mb-4">Journey Steps</h2>
        <div class="flex items-center mb-4"><a href="{{ route('journeys.steps.create', $journey->slug) }}" class="icon-button text-sm">
                <img src="/images/add.svg" class="w-4 mr-2">
                <div>Add Step to Journey</div>
            </a></div>
        <div class="mb-6">
            @forelse($journey->steps as $step)
                <div
                    class="px-2 pl-4 py-4 lg:flex items-center justify-between border rounded-md mb-2">
                    <div class="lg:w-3/4">
                        <h3 class="text-lg">{{$step->title}}</h3>
                        @if($step->date)
                            <h4 class="text-sm">{{ $step->formatted_date }}</h4>
                        @endif
                    </div>
                    <div class="flex lg:flex-col lg:items-end items-center justify-between mt-2 lg:mt-0">
                        <a href="{{ route('steps.edit', $step->id) }}" class="flex underline items-center lg:mb-2">
                            <img class="w-4 h-4 mr-2" src="/images/edit.svg">
                            <div>Edit</div>
                        </a>
                        <modal-component>

                            <template v-slot:opener>
                                <div class="flex underline items-center">
                                    <img class="w-4 mr-2" src="/images/bin.svg">Delete
                                </div>
                            </template>

                            <template v-slot:header>Are you sure you want to delete this step on your journey?
                            </template>

                            <template v-slot:content>
                                Once a step is deleted, it is completely removed and there is no way of getting it back.
                            </template>

                            <template v-slot:action>
                                <form class="flex w-full rounded-md shadow-sm sm:w-auto" method="post"
                                      action="{{ route('steps.destroy', $step->id) }}">
                                    @method('delete')
                                    @csrf
                                    <button type="submit" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-red-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-red-500 focus:outline-none focus:border-red-700 focus:shadow-outline-red transition ease-in-out duration-150 sm:text-sm sm:leading-5">Yes, Delete Step</button>
                                </form>
                            </template>

                        </modal-component>
                    </div>

                </div>
            @empty
                <p class="bg-black p-4 rounded-md text-white">Add the first step you took down this journey, or
                    the first step you dream of taking.</p>
            @endforelse
        </div>

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

