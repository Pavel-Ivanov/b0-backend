<div class="mt-6 sm:mt-5 sm:pt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200">
    @if($label ?? null)
        <label for="{{$name}}" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            {{ ($attributes['required'] ?? false) ? $label.' *' : $label }}
        </label>
    @endif

    <div class="mt-1 sm:mt-0 sm:col-span-2">
        <div class="max-w-lg rounded-md shadow-sm">
            <input type="text" id="{{$name}}" name="{{$name}}" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                   aria-label="{{$name}}"
                   value="{{ old($name) ?? $attributes['value'] ?? '' }}"
{{--                    {{ ($attributes['required'] ?? false) ? 'required' : '' }}--}}
            />
        </div>
        @error($name)
            <p class="mt-2 text-sm text-red-500" role="alert">{{ $errors->first($name) }}</p>
        @enderror
    </div>
</div>
