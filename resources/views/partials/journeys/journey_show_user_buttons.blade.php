<div class="fixed bottom-0 lg:top-0 lg:bottom-auto border inset-x-0">
    <div class="ml-auto px-3 py-2 flex  flex-wrap justify-end items-center bg-white">
        <publish-journey-component :journey="{{ $journey }}" class="mx-2"></publish-journey-component>
        <make-public-component :journey="{{ $journey }}" class="mx-2"></make-public-component>
        <a href="{{ route('journeys.steps.create', $journey->slug) }}" class="icon-button text-sm">
            <img src="/images/add.svg" class="w-4 mr-2">
            <div>Add Steps</div>
        </a>
    </div>
    <div class="absolute left-0 lg:left-auto lg:right-0 top-0 mb-10 lg:mb-0 lg:top-auto">
        <div class="tooltip">
            <img src="/images/info.svg" class="m-3 w-4">
            <span class='tooltip-text bg-yellow-200 p-3 bottom-0 lg:top-0 lg:mt-10 mt-0 mb-10 lg:mb-0 right-auto left-0 lg:right-0 lg:left-auto lg:bottom-auto rounded'>Only you can see this action bar.</span>
        </div>
    </div>
</div>
