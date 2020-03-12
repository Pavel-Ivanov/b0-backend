<div class="mt-6 sm:mt-5">
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-3">
        <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Название
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-xs rounded-md shadow-sm">
                <input id="name" name="name" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    aria-label="name" value="{{ old('name') ?? $manufacturer->name }}">
            </div>
        </div>
    </div>
    @error('name')
        <div class="text-red-500 sm:text-sm" role="alert">{{ $errors->first('name') }}</div>
    @enderror

    <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-3">
        <label for="country" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Страна
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-xs rounded-md shadow-sm">
                <select id="country" name="country" class="block form-select w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    aria-label="country">
                    @foreach(\App\Enums\Countries::getValues() as $value)
                        <option @if($value === $manufacturer->country) selected @endif>{{$value}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    @error('country')
    <div class="text-red-500 sm:text-sm" role="alert">{{ $errors->first('country') }}</div>
    @enderror
</div>
@csrf
