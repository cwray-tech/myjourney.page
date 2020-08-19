@if ($errors->any())
    <div class="bg-yellow-300 p-4 my-4 rounded">
        <ul class="pl-4">
            @foreach ($errors->all() as $error)
                <li class="list-disc">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
