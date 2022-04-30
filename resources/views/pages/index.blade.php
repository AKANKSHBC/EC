@extends('home')

@section('content')
    <div class="container max-w-5xl mx-auto my-16 py-12 px-6">
        <h1 class="font-bold text-5xl leading-snug text-center">Extra Curricular and Co-Curricular</h1>
        <div class="w-2/3 grow-0 shrink-0 basis-auto text-justify mx-auto my-2">
            <p class="mb-6 text-xl font-light">Quickly go through new updates and customize responsive mobile-first sites with Bootstrap, the world's most popular front-end open source toolkit, featuring Sass variables and mixins, responsive grid system, extensive prebuilt components, and powerful JavaScript plugins.</p>
            
            <div class="d-grid gap-3 d-sm-flex justify-content-sm-around">
            <a type="button" href="{{ route('activity') }}" class="px-6 text-white bg-blue-600 border border-blue-700 font-normal leading-normal text-center align-middle py-1.5 text-base rounded transition hover:bg-indigo-600 hover:border-indigo-700">Explore</a>
            </div>
        </div>
    </div>
    <div class="hidden 2sm:block text-center p-4 fixed bottom-0 left-0 right-0 " style="background-color: #1abc9c">
        <p class="text-white mb-0">Made by Jebon, Shihas &amp; Akanksh</p>
      </div>
@endsection