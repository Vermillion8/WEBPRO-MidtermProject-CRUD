@extends('layouts.main')

@section('container')
    <div class="flex">
        <img class="flex-none h-10 w-10 rounded-full object-cover mr-2" src="https://via.placeholder.com/150" alt="">
        <h1 class="text-3xl font-bold mb-2">
            {{ $user->username }}
        </h1>
    </div>
    <div>
        <h1 class="font-medium text-xm mt-2">
            Department of {{ $user->department }}
        </h1>
    </div>

    @auth
    @if (auth()->user()->id == $user->id)
    <div>
        <form action="/changeprofile" method="POST">
            @csrf

            <input type="hidden" name="user_id" value="{{ $user->id }}">
            <button type="submit" class="mt-1 inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-its-blue hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700">
                Edit Profile
            </button>
        </form>
    </div>
    @endif
    @endauth
@endsection