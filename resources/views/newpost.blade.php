@extends('layouts.main')

@section('container')
    @error('text')
        <span class="text-red-500">{{ $message }}</span>
    @enderror

    <h1 class="text-3xl font-bold mb-2">
        Make a new post
    </h1>
    
    <div class="flex justify-start max-w-md mr-10">
        <form action="/newpost" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 w-full">
            @csrf

            <div class="mb-4">
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
                <button class="bg-its-blue hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:ring-2 ring-its-blue ring-offset-2"
                    type="submit">Post</button>
            </div>
        </form>
    </div>

    <script>
        const textarea = document.getElementById("body");
        const charCount = document.getElementById("charCount");
        textarea.addEventListener("input", () => {
            charCount.textContent = textarea.value.length + " characters";
        });
    </script>

@endsection
