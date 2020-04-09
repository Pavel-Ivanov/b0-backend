<div class="mt-6 sm:mt-5 sm:pt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200">
    @if($label ?? null)
        <label for="{{$name}}" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            {{ ($attributes['required'] ?? false) ? $label.' *' : $label }}
        </label>
    @endif

    <div class="mt-1 sm:mt-0 sm:col-span-2 flex">
        <input id="{{$name}}" name="{{$name}}" type="file">
        <img src="{{$path}}" class="" alt=""/>

        @error($name)
            <p class="mt-2 text-sm text-red-500" role="alert">{{ $message }}</p>
        @enderror
    </div>
</div>
