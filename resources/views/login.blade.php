@extends('layouts.main')

@section('container')
    @if(session()->has('signupSuccess'))
        <div class="bg-green-700 text-white p-6 rounded-2xl">
            {{ session('signupSuccess') }}
        </div>
    @endif

    @if(session()->has('loginError'))
        <div class="bg-red-500 text-white p-6 rounded-2xl">
            {{ session('loginError') }}
        </div>
    @endif

    <div class="flex justify-center items-center min-h-screen">
        <div class="w-full max-w-md">
            <h1 class=" text-its text-3xl font-bold text-center mb-4 flex flex-col items-center justify-center" style="color: rgb(2,56,128)">
                reddITS
            </h1>
            <form action="/login" method="POST" class="bg-white shadow-lg rounded px-8 py-6 mb-4">
                @csrf
                <div class="mb-4">
                    <label class="block text-gray-700 font-bold mb-2" for="username">
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
                    <label class="block text-gray-700 font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" name="password" type="password" placeholder="Password" required>
                </div>
                <div class="flex items-center justify-between">
                    <button type="submit" class="mt-1 inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-its-blue hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700" type="submit" >
                        Login
                    </button>
                </div>
                <div class="mt-2">
                    <span>Haven't registered yet? </span><a href="/signup" class="text-blue-700">Sign up</a>
                </div>
            </form>
        </div>
    </div>
@endsection