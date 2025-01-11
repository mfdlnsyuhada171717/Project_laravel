@extends('Layouts.index')

@section('content')
    <section class="container my-24 mx-auto">
        <form action="{{ route('movies.store') }}" method="POST" enctype="multipart/form-data"
            class="max-w-4xl mx-auto bg-blue-50 rounded-lg border border-gray-200 shadow-md p-6">
            @csrf

            <!-- Title -->
            <div class="mb-4">
                <label for="title" class="block text-sm font-medium text-gray-700">Title</label>
                <input type="text" name="title" id="title" value="{{ old('title') }}"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
                @error('title')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Year -->
            <div class="mb-4">
                <label for="year" class="block text-sm font-medium text-gray-700">Year</label>
                <input type="number" name="year" id="year" value="{{ old('year') }}"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    min="1900" max="{{ date('Y') }}" required>
                @error('year')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Genre -->
            <div class="mb-4">
                <label for="genre_id" class="block text-sm font-medium text-gray-700">Genre</label>
                <select name="genre_id" id="genre_id"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>
                    <option value="" disabled {{ old('genre_id') ? '' : 'selected' }}>Select Genre</option>
                    @foreach ($genres as $genre)
                        <option value="{{ $genre->id }}" {{ old('genre_id') == $genre->id ? 'selected' : '' }}>
                            {{ $genre->name }}
                        </option>
                    @endforeach
                </select>
                @error('genre_id')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Synopsis -->
            <div class="mb-4">
                <label for="synopsis" class="block text-sm font-medium text-gray-700">Synopsis</label>
                <textarea name="synopsis" id="synopsis" rows="4"
                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 sm:text-sm"
                    required>{{ old('synopsis') }}</textarea>
                @error('synopsis')
                    <span class="text-red-500 text-sm">{{ $message }}</span>
                @enderror
            </div>

            <!-- Poster -->
            <div class="flex flex-col items-center justify-center w-full mb-5">
                <!-- File Input -->
                <label for="poster"
                    class="flex flex-col items-center justify-center w-full h-64 border-2 border-gray-300 border-dashed rounded-lg cursor-pointer bg-gray-50 dark:hover:bg-gray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6 relative">
                        <div id="image-preview-container" class="mb-4 hidden w-full h-full bg-red-200 absolute z-50">
                            <img id="image-preview" class=" h-full w-full object-cover rounded-md" alt="Image Preview" />
                        </div>
                        <svg class="w-8 h-8 mb-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Click to
                                upload</span> or drag
                            and drop</p>
                        <p class="text-xs text-gray-500 dark:text-gray-400">SVG, PNG, JPG, or GIF (MAX. 2MB)</p>
                    </div>
                    <input id="poster" name="poster" type="file" class="hidden" accept="posters/*" />
                </label>
            </div>

            <!-- Available -->
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="available" id="available" value="1"
                    class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                    {{ old('available') ? 'checked' : '' }}>
                <label for="available" class="ml-2 block text-sm text-gray-700">Available</label>
            </div>

            <!-- Submit Button -->
            <button type="submit"
                class="w-full text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg px-5 py-2.5 text-center">
                Submit
            </button>
        </form>
    </section>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('poster').addEventListener('change', function(event) {
                const file = event.target.files[0];
                const previewContainer = document.getElementById('image-preview-container');
                const previewImage = document.getElementById('image-preview');

                if (file) {
                    const reader = new FileReader();

                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewContainer.classList.remove('hidden');
                    };

                    reader.readAsDataURL(file);
                } else {
                    previewContainer.classList.add('hidden');
                    previewImage.src = '';
                }
            });
        });
    </script>
@endsection
