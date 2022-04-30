@extends('home')

@section('content')

    <header class="bg-white shadow">
        <div class="flex justify-between max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ Auth::user()->name }}
            </h2>
            <button class="px-6 text-white bg-blue-600 border border-blue-700 font-normal leading-normal text-center align-middle py-1.5 text-base rounded transition ">
                Create Post
            </button>
        </div>
    </header>
    <main>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-400">
                        Sorry {{ Auth::user()->name }} ! You have no posts yet.
                    </div>
                </div>
            </div>
        </div>
    </main>
    
@endsection
