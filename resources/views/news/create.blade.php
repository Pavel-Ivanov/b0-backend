@extends('layouts.app')

@section('content')
{{-- Шапка --}}
<div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
    <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
        <div class="ml-4 mt-2">
            <h1 class="text-2xl font-semibold text-gray-900">Новая Новость</h1>
        </div>
    </div>
</div>
{{-- Основной контент страницы --}}
<div class="relative overflow-hidden">
    <form class="w-full" method="POST" action="{{route('news.store')}}" enctype="multipart/form-data">

        @include('news.form')

        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="flex justify-end">
                <span class="inline-flex rounded-md shadow-sm">
                    <button type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition duration-150 ease-in-out">
                      Создать
                    </button>
                </span>
                <span class="ml-3 inline-flex rounded-md shadow-sm">
                    <a href="{{route('news.index')}}">
                        <button type="button" class="py-2 px-4 border border-gray-300 rounded-md text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                          Выход
                        </button>
                    </a>
                </span>
            </div>
        </div>


{{--
        <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-3">
            <button type="submit"
                class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm text-white py-1 px-8 rounded">
                Create
            </button>
            <a href="{{route('news.index')}}">
                <button type="button"
                    class="flex-shrink-0 bg-red-500 hover:bg-red-700 border-red-500 hover:border-red-700 text-sm text-white py-1 px-8 rounded">
                    Cancel
                </button>
            </a>
        </div>
--}}
    </form>
</div>
@endsection
