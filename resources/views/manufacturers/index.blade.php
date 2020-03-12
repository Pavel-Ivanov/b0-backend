@extends('layouts.app')

@section('content')
{{-- Шапка --}}
<div class="bg-white px-4 py-5 border-b border-gray-200 sm:px-6">
    <div class="-ml-4 -mt-2 flex items-center justify-between flex-wrap sm:flex-no-wrap">
        <div class="ml-4 mt-2">
            <h1 class="text-2xl font-semibold text-gray-900">Производители</h1>
        </div>
        <div class="ml-4 mt-2 flex-shrink-0">
            <a href="{{route('manufacturers.create')}}" class="">
                <button class="bg-transparent hover:bg-blue-500 text-blue-700 hover:text-white py-1 px-4 border border-blue-500 hover:border-transparent rounded inline-flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-4 h-4 mr-2">
                        <path d="M15 9h-3v2h3v3h2v-3h3V9h-3V6h-2v3zM0 3h10v2H0V3zm0 8h10v2H0v-2zm0-4h10v2H0V7zm0 8h10v2H0v-2z"/>
                    </svg>
                    <span>New</span>
                </button>
            </a>
        </div>
    </div>
</div>
{{-- Основной контент страницы --}}
<div class="flex flex-col mt-4">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8">
        <div class="align-middle inline-block min-w-full shadow overflow-hidden sm:rounded-lg border-b border-gray-200">
            <table class="min-w-full">
{{--
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Название
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                            Страна
                        </th>
                        <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                    </tr>
                </thead>
--}}
            <tbody class="bg-white">
                @foreach($manufacturers as $manufacturer)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 font-medium text-gray-900">
{{--                                <a href="{{route('manufacturers.show', $manufacturer->id)}}" class="mr-2 inline-flex">--}}
                                {{$manufacturer->name}}
{{--                            </a>--}}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 leading-5 text-gray-500">
                            {{$manufacturer->country}}
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
{{--                                    <a href="#" class="text-indigo-600 hover:text-indigo-900 focus:outline-none focus:underline">Edit</a>--}}
                            <a href="{{route('manufacturers.edit', $manufacturer->id)}}" class="mr-2 inline-flex">
                                <button class="bg-transparent hover:bg-green-500 text-green-700 hover:text-white py-1 px-4 border border-green-500 hover:border-transparent rounded inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-4 h-4 mr-2">
                                        <path d="M12.3 3.7l4 4L4 20H0v-4L12.3 3.7zm1.4-1.4L16 0l4 4-2.3 2.3-4-4z"/>
                                    </svg>
                                    <span>Edit</span>
                                </button>
                            </a>
                            <form action="{{route('manufacturers.destroy', $manufacturer->id)}}" method="post" onsubmit="return confirm('Вы уверены?');" class=" inline-flex">
                                @method('delete')
                                <button class="bg-transparent hover:bg-red-500 text-red-700 hover:text-white py-1 px-4 border border-red-500 hover:border-transparent rounded inline-flex items-center">
                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" class="fill-current w-4 h-4 mr-2">
                                        <path d="M6 2l2-2h4l2 2h4v2H2V2h4zM3 6h14l-1 14H4L3 6zm5 2v10h1V8H8zm3 0v10h1V8h-1z"/>
                                    </svg>
                                    <span>Delete</span>
                                </button>
                                @csrf
                            </form>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>
@endsection
