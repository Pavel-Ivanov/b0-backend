<div class="mt-6 sm:mt-5">
    {{-- Главная --}}
    <div>
        {{-- Шапка --}}
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Главная
            </h3>
            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                Основная информация
            </p>
        </div>

        <x-form.-text-field name="title" label="Заголовок" required :value="$news->title" />

        <x-form.-text-field name="announcement" label="Анонс" required :value="$news->announcement" />

{{--
            <div class="mt-6 sm:mt-5 sm:pt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200">
                <label for="title" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    Заголовок *
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg rounded-md shadow-sm">
                        <input type="text" id="title" name="title" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                               aria-label="title" value="{{ old('title') ?? $news->title }}" />
                    </div>
                    @error('title')
                        <p class="mt-2 text-sm text-red-500" role="alert">{{ $errors->first('title') }}</p>
                    @enderror
                </div>
            </div>
--}}

{{--
            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="announcement" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    Анонс *
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg rounded-md shadow-sm">
                        <input type="text" id="announcement" name="announcement" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                               aria-label="announcement" value="{{ old('announcement') ?? $news->announcement }}"/>
                    </div>
                    @error('announcement')
                        <p class="mt-2 text-sm text-red-500" role="alert">{{ $errors->first('announcement') }}</p>
                    @enderror
                </div>
            </div>
--}}

        <x-form.-textarea-field name="body" label="Текст" :value="$news->body" />

{{--
            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="body" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    Текст *
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg flex rounded-md shadow-sm">
                        <textarea id="body" name="body" rows="3" class="form-textarea block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">{{ old('body') ?? $news->body }}</textarea>
                    </div>
                    @error('body')
                        <p class="mt-2 text-sm text-red-500" role="alert">{{ $errors->first('body') }}</p>
                    @enderror
                </div>
            </div>
--}}

            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-center sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="image" class="block text-sm leading-5 font-medium text-gray-700">
                    Картинка
                </label>
                <input id="image" name="image" type="file">
                <img src="{{$news->getFirstMediaUrl('news-image', 'thumb')}}" class="" />
        </div>
    </div>
    {{-- Мета --}}
    <div class="mt-8 border-t border-gray-200 pt-8 sm:mt-5 sm:pt-10">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Мета
            </h3>
            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                Мета информация
            </p>
        </div>
{{--        <div class="mt-6 sm:mt-5">--}}
        <x-form.-text-field name="meta_title" label="Meta title" required :value="$news->meta_title" />

{{--
            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="meta_title" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    Meta title
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg rounded-md shadow-sm">
                        <input type="text" id="meta_title" name="meta_title" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                               aria-label="meta_title" value="{{ old('meta_title') ?? $news->meta_title }}" />
                    </div>
                </div>
                @error('meta_title')
                    <p class="mt-2 text-sm text-red-500" role="alert">{{ $errors->first('meta_title') }}</p>
                @enderror
            </div>
--}}

        <x-form.-text-field name="meta_description" label="Meta description" required :value="$news->meta_description" />

{{--
            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="meta_description" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    Meta description
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg rounded-md shadow-sm">
                        <input type="text" id="meta_description" name="meta_description" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                               aria-label="meta_description" value="{{ old('meta_description') ?? $news->meta_description }}" />
                    </div>
                </div>
                @error('meta_description')
                    <p class="mt-2 text-sm text-red-500" role="alert">{{ $errors->first('meta_description') }}</p>
                @enderror
            </div>
--}}

        <x-form.-text-field name="alias" label="Alias" required :value="$news->alias" />

{{--
            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="alias" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    Alias
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <div class="max-w-lg rounded-md shadow-sm">
                        <input type="text" id="alias" name="alias" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                               aria-label="alias" value="{{ old('alias') ?? $news->alias }}" />
                    </div>
                </div>
                @error('alias')
                    <p class="mt-2 text-sm text-red-500" role="alert">{{ $errors->first('alias') }}</p>
                @enderror
            </div>
--}}

            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                <label for="published" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
                    Опубликовано
                </label>
                <div class="mt-1 sm:mt-0 sm:col-span-2">
                    <span x-data="{ value: false, toggle() { this.value = !this.value } }" :class="{ 'bg-gray-200': !value, 'bg-indigo-600': value }"
                          class="relative inline-block flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline"
                          role="checkbox" tabindex="0" @click="toggle()" @keydown.space.prevent="toggle()" :aria-checked="value.toString()">
                          <span aria-hidden="true" :class="{ 'translate-x-5': value, 'translate-x-0': !value }"
                                class="inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200">
                          </span>
                        <input type="hidden" name="published" :value="value">
                    </span>
                </div>
                @error('published')
                    <p class="mt-2 text-sm text-red-500" role="alert">{{ $errors->first('published') }}</p>
                @enderror
            </div>
{{--        </div>--}}
    </div>
    @csrf
{{--
    <div class="mt-8 border-t border-gray-200 pt-8 sm:mt-5 sm:pt-10">
        <div>
            <h3 class="text-lg leading-6 font-medium text-gray-900">
                Notifications
            </h3>
            <p class="mt-1 max-w-2xl text-sm leading-5 text-gray-500">
                We'll always let you know about important changes, but you pick what else you want to hear about.
            </p>
        </div>
        <div class="mt-6 sm:mt-5">
            <div class="sm:border-t sm:border-gray-200 sm:pt-5">
                <fieldset>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                        <div>
                            <legend class="text-base leading-6 font-medium text-gray-900 sm:text-sm sm:leading-5 sm:text-gray-700">
                                By Email
                            </legend>
                        </div>
                        <div class="mt-4 sm:mt-0 sm:col-span-2">
                            <div class="max-w-lg">
                                <div class="relative flex items-start">
                                    <div class="absolute flex items-center h-5">
                                        <input id="comments" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                                    </div>
                                    <div class="pl-7 text-sm leading-5">
                                        <label for="comments" class="font-medium text-gray-700">Comments</label>
                                        <p class="text-gray-500">Get notified when someones posts a comment on a posting.</p>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="relative flex items-start">
                                        <div class="absolute flex items-center h-5">
                                            <input id="candidates" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                                        </div>
                                        <div class="pl-7 text-sm leading-5">
                                            <label for="candidates" class="font-medium text-gray-700">Candidates</label>
                                            <p class="text-gray-500">Get notified when a candidate applies for a job.</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4">
                                    <div class="relative flex items-start">
                                        <div class="absolute flex items-center h-5">
                                            <input id="offers" type="checkbox" class="form-checkbox h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                                        </div>
                                        <div class="pl-7 text-sm leading-5">
                                            <label for="offers" class="font-medium text-gray-700">Offers</label>
                                            <p class="text-gray-500">Get notified when a candidate accepts or rejects an offer.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
            <div class="mt-6 sm:mt-5 sm:border-t sm:border-gray-200 sm:pt-5">
                <fieldset>
                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-baseline">
                        <div>
                            <legend class="text-base leading-6 font-medium text-gray-900 sm:text-sm sm:leading-5 sm:text-gray-700">
                                Push Notifications
                            </legend>
                        </div>
                        <div class="sm:col-span-2">
                            <div class="max-w-lg">
                                <p class="text-sm leading-5 text-gray-500">These are delivered via SMS to your mobile phone.</p>
                                <div class="mt-4">
                                    <div class="flex items-center">
                                        <input id="push_everything" name="form-input push_notifications" type="radio" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                                        <label for="push_everything" class="ml-3">
                                            <span class="block text-sm leading-5 font-medium text-gray-700">Everything</span>
                                        </label>
                                    </div>
                                    <div class="mt-4 flex items-center">
                                        <input id="push_email" name="form-input push_notifications" type="radio" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                                        <label for="push_email" class="ml-3">
                                            <span class="block text-sm leading-5 font-medium text-gray-700">Same as email</span>
                                        </label>
                                    </div>
                                    <div class="mt-4 flex items-center">
                                        <input id="push_nothing" name="form-input push_notifications" type="radio" class="form-radio h-4 w-4 text-indigo-600 transition duration-150 ease-in-out" />
                                        <label for="push_nothing" class="ml-3">
                                            <span class="block text-sm leading-5 font-medium text-gray-700">No push notifications</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
            </div>
        </div>
    </div>
--}}
</div>
{{--
<div class="mt-8 border-t border-gray-200 pt-5">
    <div class="flex justify-end">
        <span class="inline-flex rounded-md shadow-sm">
            <button type="button" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
              Cancel
            </button>
        </span>
        <span class="ml-3 inline-flex rounded-md shadow-sm">
            <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
              Save
            </button>
        </span>
    </div>
</div>
--}}

{{--
<div class="mt-6 sm:mt-5">
    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-3">
        <label for="title" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Заголовок *
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-xs rounded-md shadow-sm">
                <input type="text" id="title" name="title" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    aria-label="title" value="{{ old('title') ?? $news->title }}">
            </div>
        </div>
    </div>
    @error('title')
        <div class="text-red-500 sm:text-sm" role="alert">{{ $errors->first('title') }}</div>
    @enderror

    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-3">
        <label for="announcement" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Анонс
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-xs rounded-md shadow-sm">
                <input type="text" id="announcement" name="announcement" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    aria-label="announcement" value="{{ old('announcement') ?? $news->announcement }}">
            </div>
        </div>
    </div>
    @error('announcement')
        <div class="text-red-500 sm:text-sm" role="alert">{{ $errors->first('announcement') }}</div>
    @enderror

    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-3">
        <label for="body" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Текст
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-xs rounded-md shadow-sm">
                <input id="body" name="body" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    aria-label="body" value="{{ old('body') ?? $news->body }}">
            </div>
        </div>
    </div>
    @error('body')
        <div class="text-red-500 sm:text-sm" role="alert">{{ $errors->first('body') }}</div>
    @enderror

    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-3">
        <label for="image" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Картинка
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-xs rounded-md shadow-sm">
                <input id="image" name="image" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    aria-label="body" value="{{ old('image') ?? $news->image }}">
            </div>
        </div>
    </div>
    @error('image')
        <div class="text-red-500 sm:text-sm" role="alert">{{ $errors->first('image') }}</div>
    @enderror

    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-3">
        <label for="meta_title" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Meta title
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-xs rounded-md shadow-sm">
                <input id="meta_title" name="meta_title" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    aria-label="meta_title" value="{{ old('meta_title') ?? $news->meta_title }}">
            </div>
        </div>
    </div>
    @error('meta_title')
        <div class="text-red-500 sm:text-sm" role="alert">{{ $errors->first('meta_title') }}</div>
    @enderror

    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-3">
        <label for="meta_description" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Meta description
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-xs rounded-md shadow-sm">
                <input id="meta_description" name="meta_description" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    aria-label="meta_description" value="{{ old('meta_description') ?? $news->meta_description }}">
            </div>
        </div>
    </div>
    @error('meta_description')
        <div class="text-red-500 sm:text-sm" role="alert">{{ $errors->first('meta_description') }}</div>
    @enderror

    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-3">
        <label for="alias" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Alias
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-xs rounded-md shadow-sm">
                <input id="alias" name="alias" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    aria-label="alias" value="{{ old('alias') ?? $news->alias }}">
            </div>
        </div>
    </div>
    @error('alias')
        <div class="text-red-500 sm:text-sm" role="alert">{{ $errors->first('alias') }}</div>
    @enderror

    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-3">
        <label for="published" class="block text-sm font-medium leading-5 text-gray-700 sm:mt-px sm:pt-2">
            Published
        </label>
        <div class="mt-1 sm:mt-0 sm:col-span-2">
            <div class="max-w-xs rounded-md shadow-sm">
                <input id="published" name="published" class="form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5"
                    aria-label="published" value="{{ old('published') ?? $news->published }}">
            </div>
--}}
{{--
            <span x-data="{ value: true, toggle() { this.value = !this.value } }" :class="{ 'bg-gray-200': !value, 'bg-indigo-600': value }"
                  class="relative inline-block flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:shadow-outline"
                  role="checkbox" tabindex="0" @click="toggle()" @keydown.space.prevent="toggle()" :aria-checked="value.toString()">
              <span aria-hidden="true" :class="{ 'translate-x-5': value, 'translate-x-0': !value }"
                    class="inline-block h-5 w-5 rounded-full bg-white shadow transform transition ease-in-out duration-200">
              </span>
            </span>
--}}{{--

        </div>
    </div>
    @error('published')
        <div class="text-red-500 sm:text-sm" role="alert">{{ $errors->first('published') }}</div>
    @enderror

</div>
--}}
