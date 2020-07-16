@auth
    @php
    $user = auth()->user();
    @endphp
<div class="fixed bottom-0 lg:static inset-x-0 bg-white">
    <div class="container mx-auto px-4 py-1 flex justify-end">
        <a href="/dashboard" class="border border-black rounded inline-flex items-center bg-white shadow-sm px-2 py-1 mr-3">
            <img class="w-4 mr-1 h-4" src="/images/dashboard.svg">
            <span>Dash<span class="hidden md:inline-block">board</span></span>
        </a>
        <a href="{{route('users.journeys.index', $user->id)}}" class="border border-black rounded inline-flex items-center bg-white shadow-sm px-2 py-1 mr-3">
            <img class="w-4 mr-1 h-4" src="/images/eye.svg">
            <span><span class="hidden md:inline-block">Your</span> Journeys</span>
        </a>
        <a href="{{route('journeys.create')}}" class="border-2 border-black rounded inline-flex items-center bg-white shadow-sm px-2 py-1">
            <img class="w-4 mr-1 h-4" src="/images/write.svg">
            <span>Write <span class="hidden md:inline-block">Journey</span></span>
        </a>
    </div>
</div>
@endauth
