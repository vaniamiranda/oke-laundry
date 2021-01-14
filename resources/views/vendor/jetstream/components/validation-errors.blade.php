@if ($errors->any())
<div {{ $attributes }}>
    <div class="bg-red-700 rounded-lg text-white px-2 py-1" role="alert">
        <div class="flex flex-wrap">
            @foreach ($errors->all() as $error)
            <p class="text-sm font-bold text-center w-full">{{ $error }}</p>
            @endforeach
        </div>
    </div>
</div>
@endif