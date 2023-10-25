@extends('layouts.main')

@section('container')
  <h1 class="text-3xl font-bold">
    Home
  </h1>

  <form action="{{ route('search') }}" method="GET" class="mb-4">
    <div class="relative">
        <input
            type="text"
            name="keyword"
            placeholder="Search"
            class="bg-gray-100 rounded-full w-full py-1 pl-5"
            value="{{ isset($keyword) ? $keyword : '' }}"
        />
        <button type="submit" class="absolute top-0 right-0 mt-2 mr-2">
            <span class="material-icons" style="font-size: 20px">search</span>
        </button>
    </div>
</form>

  @if (count($posts) > 0)
    @foreach ($posts as $post)
      <div class="bg-gray-100 my-6 p-6 max-w-3x rounded-2xl">
        <a href="/profile/{{ $post->user->username }}" class="text-its-blue font-bold">
          {{ $post->user->username }}
        </a>
        <span class="text-gray-400"> on {{ $post->created_at->format('M d, Y') }} at {{ $post->created_at->format('h:i A') }}</span>
        
        @if ($post->category) 
          <div class="bg-blue-500 text-white text-xs py-1 px-2 rounded-full">
            Category: {{ $post->category->name }}
          </div>
        @endif
        
        <a href="/post/{{ $post->slug }}">
          <h2 class="text-xl font-semibold mt-2 mb-2">{{ $post->text }}</h2>
          <a href="/post/{{ $post->slug }}" class="flex space-x-1 items-center">
            <span class="material-icons" style="font-size:20px">comment</span>
            <span>{{ count($post->comments) }}</span>
          </a>
        </a>
      </div>
    @endforeach
  @else
    @if (isset($keyword))
      <p class="text-lg text-gray-600">No results found for '{{ $keyword }}'.</p>
    @endif
  @endif
@endsection