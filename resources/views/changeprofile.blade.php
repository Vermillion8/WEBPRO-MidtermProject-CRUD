@extends('layouts.main')

@section('container')
    <body class="bg-gray-100">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="py-10">
            <!-- Profile header -->
            <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col items-center">
                    <img class="h-24 w-24 rounded-full object-cover" src="https://via.placeholder.com/150" alt="">
                    <h2 class="mt-4 text-xl font-bold">{{ $user->username }}</h2>
                    <p class="text-gray-600">Department of {{ $user->department }}</p>
                </div>
            </div>

            <!-- Edit profile form -->
            <div class="mt-10">
                <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow rounded-lg">
                        <form action="/savechangeprofile" method="POST">
                            @csrf

                            <input type="hidden" name="user_id" value="{{ $user->id }}">
                            <div class="px-4 py-5 sm:p-6">
                                <h3 class="text-lg leading-6 font-medium text-gray-900">Profile information</h3>
                                <div class="mt-2 max-w-xl text-sm text-gray-500">
                                    <div class="mb-4">
                                        <label class="block text-gray-700 font-bold mb-2" for="username">
                                            Username
                                        </label>
                                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="name" name="username" type="text" placeholder="John Doe" value="{{ $user->username }}">
                                    </div>
                                    <div class="mb-4">
                                        <label class="block text-gray-700 font-bold mb-2" for="department">
                                            Department origin
                                        </label>
                                        <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="department" name="department" type="text" placeholder="Marketing" value="{{ $user->department }}">
                                    </div>
                                </div>
                            </div>
                            <div class="px-4 py-3 sm:px-6">
                                <button type="submit" class="inline-flex items-center justify-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-its-blue hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-700">
                                    Save changes
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </body>

@endsection
