@extends('layouts.app')

@section('content')
    {{-- Шапка --}}
    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
            <div class="ml-4 mt-2">
                <h1 class="text-2xl font-semibold text-gray-900">Редактирование производитель {{$manufacturer->fullName}}</h1>
            </div>
        </div>
    </div>
    {{-- Основной контент страницы --}}
    <div class="relative overflow-hidden">
        <form class="w-full max-w-sm" method="POST" action="{{route('manufacturers.update', $manufacturer)}}" enctype="multipart/form-data">
            @method('patch')
            @include('manufacturers.form')

            <div class="mt-6 sm:mt-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-3">
                <button type="submit"
                        class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm text-white py-1 px-8 rounded">
                    Update
                </button>
                <a href="{{route('manufacturers.index')}}">
                    <button
                        class="flex-shrink-0 bg-red-500 hover:bg-red-700 border-red-500 hover:border-red-700 text-sm text-white py-1 px-8 rounded"
                        type="button">
                        Cancel
                    </button>
                </a>
            </div>
        </form>
    </div>
@endsection
