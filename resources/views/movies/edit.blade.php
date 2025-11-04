@extends('layouts.app')

@section('content')
<div class="text-white">
    <h2 class="text-3xl font-bold mb-6">🎬 Edit Movie</h2>

    {{-- 🌸 View Section (Preview) --}}
    <div class="bg-gray-800 p-4 rounded-lg mb-6 shadow-md">
        <h3 class="text-xl font-semibold mb-2">Current Movie Details</h3>
        <div class="flex items-start space-x-4">
            @if($movie->image)
                <img src="{{ asset('storage/' . $movie->image) }}" class="w-32 h-40 object-cover rounded-lg shadow">
            @else
                <div class="w-32 h-40 bg-gray-700 flex items-center justify-center rounded">
                    <span class="text-gray-400 text-sm">No Image</span>
                </div>
            @endif
            <div>
                <p class="text-lg font-bold text-pink-400">{{ $movie->title }}</p>
                <p class="text-sm text-yellow-400 mb-1">
                    Rating:
                    @for($i = 0; $i < $movie->rating; $i++) ★ @endfor
                    @for($i = $movie->rating; $i < 5; $i++) ☆ @endfor
                </p>
                <p class="text-gray-300 text-sm mb-1"><span class="font-semibold">Review:</span> {{ $movie->review }}</p>
                <p class="text-xs text-gray-500"></p>
            </div>
        </div>
    </div>

    {{-- 🛠️ Edit Form --}}
    <form action="{{ route('movies.update', $movie->id) }}" method="POST" enctype="multipart/form-data" class="bg-gray-900 p-6 rounded-lg shadow-lg space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block font-bold mb-2">Title:</label>
            <input type="text" name="title" value="{{ $movie->title }}" class="w-full p-2 rounded bg-gray-800 text-white" required>
        </div>

        <div>
            <label class="block font-bold mb-2">Rating (1-5):</label>
            <input type="number" name="rating" value="{{ $movie->rating }}" min="1" max="5" class="w-full p-2 rounded bg-gray-800 text-white" required>
        </div>

        <div>
            <label class="block font-bold mb-2">Review:</label>
            <textarea name="review" rows="4" class="w-full p-2 rounded bg-gray-800 text-white" required>{{ $movie->review }}</textarea>
        </div>

        <div>
            <label class="block font-bold mb-2">Current Poster:</label>
            @if($movie->image)
                <img src="{{ asset('storage/' . $movie->image) }}" class="w-32 rounded mb-3">
            @else
                <p class="text-gray-400">No image uploaded</p>
            @endif
        </div>

        <div>
            <label class="block font-bold mb-2">Change Poster (optional):</label>
            <input type="file" name="image" accept="image/*" class="w-full p-2 bg-gray-800 text-white rounded">
        </div>

        <button type="submit" class="w-full bg-pink-600 hover:bg-pink-700 text-white font-bold py-2 rounded transition">
            💾 Update Movie
        </button>
    </form>
</div>
@endsection
