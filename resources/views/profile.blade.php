@extends('layouts.main')

@section('container')
<div class="flex flex-col justify-center items-center max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
  <div class="flex">
    @if ($user->profile_photo_path)
    <img class="h-20 w-20 rounded-full object-cover" src="{{ asset($user->profile_photo_path) }}" alt="{{ $user->name }}">
    @else
    <svg class="h-12 w-12 rounded-full object-cover text-gray-300">
      <rect width="100%" height="100%" fill="currentColor" />
    </svg>
    @endif
  </div>
  <div>
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
</div>
@endif
@endauth
@endsection