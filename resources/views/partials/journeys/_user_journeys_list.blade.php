@forelse($journeys as $journey)
        @include('partials.journeys._user_journey_preview')
@empty
    <div class="rounded-md flex flex-col justify-start bg-white shadow-sm shadow p-6 pb-8">
        <h2 class="text-3xl font-bold mb-6">Bummer, you haven't created any journeys yet. Want to add one?</h2>
        <a class="btn btn-cta mr-auto" href="{{ route('journeys.create') }}">Write a Journey</a>
    </div>
@endforelse
