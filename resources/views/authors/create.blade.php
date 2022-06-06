@extends('layouts.app')

@section('content')
    <div class="w-full max-w-xs">
        <form class="w-full max-w-sm" method="post" action="{{ route('authors.store') }}">
            @csrf
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-full-name">
                        Full Name
                    </label>
                </div>
                <div class="md:w-2/3">
                    {{--  @if($errors->has("name")) --}}
                    {{--     <p class="text-red">{{$errors->first()}}</p> --}}
                    {{--  @endif --}}
                    @error('name') <p class="text-red">{{$message }}</p>@enderror
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        name="name" type="text" placeholder="Jane Doe">
                </div>
            </div>
            <div class="md:flex md:items-center mb-6">
                <div class="md:w-1/3">
                    <label class="block text-gray-500 font-bold md:text-right mb-1 md:mb-0 pr-4" for="inline-password">
                        Date of birth
                    </label>
                </div>
                <div class="md:w-2/3">
                    @if($errors->has("dob"))
                        <p class="text-red">{{$errors->first()}}</p>
                    @endif
                    <input
                        class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500"
                        name="dob" type="text" placeholder="01/01/1992">
                </div>
            </div>
            <br>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3"></div>
                <div class="md:w-2/3">
                    <button
                        class="shadow bg-purple-500 hover:bg-purple-400 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded"
                        type="submit">
                        Add New Author
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection
