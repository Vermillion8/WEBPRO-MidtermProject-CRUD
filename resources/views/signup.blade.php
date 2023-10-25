@extends('layouts.main')

@section('container')

    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md">
            <h1 class=" text-its text-3xl font-bold text-center mb-4 flex flex-col items-center justify-center" style="color: rgb(2,56,128)">
                reddITS
            </h1>
            <form class="bg-white shadow-lg rounded px-8 py-6 mb-4" method="POST">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">
                        Username
                    </label>
                    <input
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('username') ring-2 ring-red-500 @enderror"
                        id="username" name="username" type="text" placeholder="Username" value="{{ old('username') }}" autofocus required>
                    @error('username')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">
                        Department
                    </label>
                    <input
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('department') ring-2 ring-red-500 @enderror"
                        id="department" name="department" type="text" placeholder="Department" value="{{ old('department') }}" required>
                    @error('department')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2">
                        Password
                    </label>
                    <input
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') ring-2 ring-red-500 @enderror"
                        id="password" name="password" type="password" placeholder="Password" required>
                    @error('password')
                        <span class="text-red-500">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit" class="mt-1 inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-its-blue hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700">
                    Sign Up
                </button>
                <div class="mt-2">
                    <span>Already have an account? </span><a href="/login" class="text-blue-700">Login</a>
                </div>
            </form>
        </div>
    </div>

@endsection
