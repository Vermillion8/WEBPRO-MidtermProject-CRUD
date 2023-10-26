@extends('layouts.main')

@section('container')
    <div class="flex justify-center items-center min-h-screen">
        <div class="max-w-lg w-full p-8"> <!-- Adjust the width (max-w-lg) -->
            @error('text')
                <span class="text-red-500">{{ $message }}</span>
            @enderror

            <h1 class="text-3xl font-bold mb-4">
                Make a new post
            </h1>

            <form action="/newpost" method="POST" class="bg-its-blue bg-opacity-30 shadow-lg rounded px-8 py-6 mb-4">
                @csrf

                <div class="mb-4">
                    <label for="category" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                    <select name="category_id" id="category" class="shadow appearance-none border-2 rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="body" class="block text-gray-700 text-sm font-bold mb-2">Post Content</label>
                    <textarea
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="body" placeholder="Write your post here (maximum 150 characters)" maxlength="150"
                        name="text" type="text" autofocus required
                    ></textarea>
                    <p class="text-gray-500 text-sm mt-2">
                        <span id="charCount">0</span>/150 characters
                    </p>
                </div>

                <div class="flex justify-start">
                    <button class="w-full bg-its-blue hover:bg-blue-700 bg-opacity-50 border-2 border-blue-600 text-white font-bold py-2 px-4 rounded focus:ring-2 ring-its-blue ring-offset-2" type="submit">Post</button>
                </div>
            </form>
        </div>
    </div>
@endsection
