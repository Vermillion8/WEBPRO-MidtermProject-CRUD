@extends('layouts.main')

@section('container')
    <div class="flex items-center">
        <a class="text-its-blue flex items-center" href="/">
            <span class="material-icons text-its-blue mr-1 flex-shrink-0" style="font-size: 18px">arrow_back_ios</span>
            <span>Back</span>
        </a>
    </div>

    <div class="bg-gray-100 p-6 rounded-2xl mt-8"><p></p>
        <a href="/profile/{{ $post->user->username }}" class="font-bold text-its-blue">{{ $post->user->username }}</a>
        <span class="text-gray-400"> on {{ $post->created_at->format('M d, Y') }} at {{ $post->created_at->format('h:i A') }}</span>
        <h1 class="mt-4 text-3xl font-bold">{{ $post->text }}</h1>

        @auth
        @if (auth()->user()->id == $post->user_id)
        <div class="flex items-center mt-4 space-x-4">
            <form action="/deletepost" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button type="submit" onclick="return confirm('Are you sure you want to delete this post?')">
                    <span class="material-icons" style="font-size:20px">delete</span>
                </button>    
            </form>

            <form action="/editpost" method="POST">
                @csrf
                <input type="hidden" name="post_id" value="{{ $post->id }}">
                <button>
                    <span class="material-icons" style="font-size:20px">create</span>
                </button>
            </form>
        </div>
        @endif
        @endauth

        @auth
            <div class="bg-gray-100 pt-6 rounded-2xl mt-2">
                <form action="/addcomment" method="POST">
                    @csrf

                    <label class="mb-2 font-medium text-gray-900 sr-only dark:text-white">Add your comment here</label>
                    <div class="relative">
                        <input type="hidden" name="post_id" value="{{ $post->id }}">
                        <input id="Comment" type="text" name="text" id="comment" class="block w-full p-4 pl-5 focus:ring-blue-700 focus:border-blue-700 rounded-2xl" placeholder="Add your comment here!" maxlength="150" required>
                        <button type="submit" class="text-white absolute right-2.5 bottom-11 bg-its-blue hover:bg-blue-700 focus:ring-2 ring-offset-2 focus:outline-none focus:ring-blue-700 font-medium text-sm px-4 py-2 rounded-xl">Comment</button>
                        <div class="text-sm text-gray-500 mt-4"><span id="charCount">0</span>/150 characters used</div>
                    </div>
                </form>
                <script>
                    const charCount = document.getElementById('charCount');
                    const commentInput = document.getElementById('Comment');
                    commentInput.addEventListener('input', function() {
                        charCount.textContent = commentInput.value.length;
                    });
                </script>
            </div>
        @else
            <p class="mt-6"><a href="/login" class="text-its-blue">Log in</a> to add comment</p>
        @endauth
    </div>


    @if (count($post->comments) > 0)
    <h2 class="text-2xl font-bold my-4">Comments</h2>
    @foreach ($post->comments as $comment)
        <div class="bg-gray-100 p-7 rounded-2xl my-4 max-w-4xl">
            <a href="/profile/{{ $comment->user->username }}" class="text-its-blue font-bold">{{ $comment->user->username }}</a>
            <span class="text-gray-400"> on {{ $comment->created_at->format('M d, Y') }} at {{ $comment->created_at->format('h:i A') }}</span>
            <p class="mt-2">{{ $comment->text }}</p>
        </div>
    @endforeach
    @endif
@endsection
