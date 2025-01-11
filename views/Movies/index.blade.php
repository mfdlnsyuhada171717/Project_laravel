@extends('Layouts.index')

@section('content')
    <section class="container my-24 mx-auto">
        @if (session('success'))
            <div id="alert-3"
                class="flex items-center p-4 mb-4 text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400 mx-20"
                role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                    viewBox="0 0 20 20">
                    <path
                        d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5ZM9.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3ZM12 15H8a1 1 0 0 1 0-2h1v-3H8a1 1 0 0 1 0-2h2a1 1 0 0 1 1 1v4h1a1 1 0 0 1 0 2Z" />
                </svg>
                <span class="sr-only">Info</span>
                <div class="ms-3 text-sm font-medium">
                    {{ session('success') }}
                </div>
                <button type="button" data-dismiss-target="#alert-3"
                    class="ms-auto bg-green-50 text-green-500 rounded-lg p-1.5 hover:bg-green-200 focus:ring-2 focus:ring-green-400">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                </button>
            </div>
        @endif

        <!-- Header -->
        <div class="flex justify-between items-center px-20 mb-8">
            <h1 class="text-4xl font-bold text-gray-800 dark:text-white">🎬 Movies List</h1>
            <a href="{{ route('movies.create') }}"
                class="bg-gradient-to-r from-blue-600 to-blue-800 hover:from-blue-700 hover:to-blue-900 text-white font-medium py-2 px-6 rounded-lg shadow-lg transition-all duration-300 ease-in-out transform hover:scale-105">
                + Add Movie
            </a>
        </div>

        <!-- Movies Grid -->
        <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 px-20">
            @forelse ($movies as $movie)
                <div class="bg-white border border-gray-200 rounded-lg shadow-lg transition-all duration-300 ease-in-out hover:shadow-xl dark:bg-gray-800">
                    <!-- Poster -->
                    <a href="#">
                        <img class="rounded-t-lg w-full h-64 object-cover" src="{{ asset('storage/' . $movie->poster) }}"
                            alt="{{ $movie->title }}">
                    </a>
                    <!-- Movie Details -->
                    <div class="p-5 space-y-2">
                        <h5 class="text-lg font-semibold text-gray-900 dark:text-white">{{ $movie->title }}</h5>
                        <p class="text-sm text-gray-500 dark:text-gray-400">{{ $movie->year }}</p>
                        <p class="text-sm text-gray-700 dark:text-gray-400">
                            {{ Str::limit($movie->synopsis, 100) }}
                        </p>
                        <p class="text-sm text-blue-500 dark:text-blue-400">Genre: {{ $movie->genres->name ?? 'Unknown' }}</p>
                        <p class="text-sm text-green-500">{{ $movie->available ? 'Available' : 'Not Available' }}</p>
                    </div>
                    <!-- Actions -->
                    <div class="flex justify-between items-center p-4 border-t">
                        <a href="{{ route('movies.edit', $movie->id) }}"
                            class="px-4 py-2 bg-gradient-to-r from-yellow-400 to-yellow-500 text-white font-medium text-sm rounded-md hover:from-yellow-500 hover:to-yellow-600 transition-all duration-200 ease-in-out transform hover:scale-105">
                            Edit
                        </a>
                        <form action="{{ route('movies.destroy', $movie->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete this movie')"
                                class="px-4 py-2 bg-gradient-to-r from-red-500 to-red-600 text-white font-medium text-sm rounded-md hover:from-red-600 hover:to-red-700 transition-all duration-200 ease-in-out transform hover:scale-105">
                                Delete
                            </button>
                        </form>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center">
                    <h2 class="text-gray-700 dark:text-gray-300 text-lg">No movies found</h2>
                    <a href="{{ route('movies.create') }}" class="text-blue-600 hover:underline">Add a new movie</a>
                </div>
            @endforelse
        </div>
    </section>
@endsection
