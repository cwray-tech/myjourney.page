@extends('layouts.app')
@section('page_title')
    Your Dashboard
@endsection
@section('content')
    <section class="py-16 min-h-screen">
        <div class="max-w-7xl mx-auto pb-12 px-4 sm:px-6 lg:px-8">
            <div class="p-2">
                <h1 class="text-4xl leading-9 font-bold">Your Dashboard</h1>
            </div>

            <div class="grid md:grid-cols-2 gap-4 mt-6">
                <a href="/dashboard/journeys" class="block rounded-md bg-white shadow sm:rounded-lg p-6 pb-8">
                    <h2 class="text-3xl font-bold mb-3">See Journeys</h2>
                    <p class="mb-6">View Journeys you've shared.</p>
                    <button class="btn btn-cta">View Journeys</button>
                </a>
                <a href="{{ route('journeys.create') }}"
                    class="block rounded-md bg-white bg-white shadow sm:rounded-lg p-6 pb-8">
                    <h2 class="text-3xl font-bold mb-3">Share a Journey</h2>
                    <p class="mb-6">Share a life journey you have had or wish you could have.</p>
                    <button class="btn btn-cta">Start Writing!</button>
                </a>
            </div>
            <div class="mt-10">
                <div class="md:flex items-center justify-between px-2">
                    <div class="mb-6 md:mb-0">
                        <h2 class="text-4xl leading-9 font-bold">Recent Journeys</h2>
                    </div>
                    <a href="{{ route('journeys.create') }}" class="btn btn-primary py-3 mt-0">Write Journey</a>
                </div>
                <div class="mt-6">
                    @forelse($journeys as $journey)
                        <div class="rounded-md bg-white shadow-sm shadow p-4 mb-6">
                            <div class="w-full grid lg:grid-cols-5 gap-4">
                                @if($journey->picture)
                                    <div class="h-64 flex justify-center items-center">
                                        <img src="{{$journey->picture_path}}" class="w-full h-full object-cover rounded">
                                    </div>
                                @endif
                                <div class="lg:col-span-3">
                                    <h2 class="text-4xl mb-3">{{ $journey->title }}</h2>
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
                    @empty
                        <div class=" flex flex-col justify-start rounded-md bg-white shadow-sm shadow p-6 pb-8">
                            <h2 class="text-3xl font-bold mb-6">Bummer, you haven't created any journeys yet. Want to add one?</h2>
                            <a class="btn btn-cta mr-auto" href="{{ route('journeys.create') }}">Write a Journey</a>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>
@endsection
