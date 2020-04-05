@extends('layouts.app')

@section('content')
    {{-- Шапка --}}
    <div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
        <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
            <div class="ml-4 mt-2">
                <h1 class="text-2xl font-semibold text-gray-900">{{$news->title}}</h1>
            </div>
        </div>
    </div>
    {{-- Основной контент страницы --}}
@endsection
