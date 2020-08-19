@auth
<div class="fixed bottom-0 lg:static inset-x-0 bg-white">
    <div class="container mx-auto px-3 py-2 flex justify-end items-center">
        <a href="/dashboard" class="border border-yellow-500 rounded-md inline-flex items-center bg-white shadow-sm px-2 py-1 mr-3">
            <img class="w-4 mr-1 h-4" src="/images/dashboard.svg">
            <span>Dash<span class="hidden md:inline-block">board</span></span>
        </a>
        <a href="/dashboard/journeys" class="border border-yellow-500 rounded-md inline-flex items-center bg-white shadow-sm px-2 py-1 mr-3">
            <img class="w-4 mr-1 h-4" src="/images/eye.svg">
            <span>Your Journeys</span>
        </a>
        <a href="{{route('journeys.create')}}" class="border-2 border-yellow-500 rounded-md inline-flex items-center bg-white shadow-sm px-2 py-1">
            <img class="w-4 mr-1 h-4" src="/images/write.svg">
            <span>Write <span class="hidden md:inline-block">Journey</span></span>
        </a>
    </div>
</div>
@endauth
