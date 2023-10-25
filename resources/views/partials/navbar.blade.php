<nav class="bg-its-blue sticky top-0">
    <div class="mx-auto">
        <div class="flex justify-between">
            <div>
                <a href="/" class="flex items-center text-xl px-2 py-4 ml-8 text-white font-bold">TrendItAll</a>
            </div>
            <div class="ml-auto flex items-center space-x-10 mr-8">
                <a href="/" class="px-2 py-4 text-white font-semibold hover:text-white @isset($title) {{ $title === "Home" ? '' : "text-opacity-40 hover:transition duration-50" }} @endisset">Home</a>
                @auth
                    <a href="/newpost" class="px-2 py-4 text-white font-semibold hover:text-white @isset($title) {{ $title === "New Post" ? '' : "text-opacity-40 hover:transition duration-50" }} @endisset">New Post</a>
                    <a href="/profile/{{ auth()->user()->username }}" class="px-2 py-4 text-white font-semibold hover:text-white @isset($title) {{ $title === "Profile" ? '' : "text-opacity-40 hover:transition duration-50" }} @endisset">Profile</a>
                @endauth
                @auth
                    <form method="POST" action="/logout">
                        @csrf
                        <button type="submit" class="px-4 py-1 text-white bg-red-600 hover:bg-red-500 border-2 border-red-600 hover:border-light blue-500 rounded-md font-semibold hover:transition hover:duration-50">Log out</button>
                    </form>
                @else
                    <a href="/login" class="px-4 py-1 text-white bg-green-600 hover:bg-green-500 border-2 border-green-600 hover:border-green-500 rounded-md font-semibold hover:transition hover:duration-50">Log in</a>
                @endauth
            </div>
        </div>
    </div>
</nav>
