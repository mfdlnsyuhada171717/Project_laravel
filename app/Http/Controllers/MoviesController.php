<?php

namespace App\Http\Controllers;

use App\Models\Genres;
use App\Models\Movies;
use Illuminate\Http\Request;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movies::with('genres')->get();
        return view('movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $genres = Genres::all();
        return view('movies.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            'poster' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',  // Validasi file gambar
            'year' => 'required|integer|min:1900|max:' . date('Y'), // Tahun valid
            'available' => 'required|boolean',
            'genre_id' => 'required|exists:genres,id', // Pastikan genre_id valid di tabel genres
        ]);

        if ($request->file('poster')) {
            $validated['poster'] = $request->file('poster')->store('posters/' . date('Y/m/d'), 'public');

        }

        // Simpan data ke dalam tabel movies
        Movies::create([
            'title' => $validated['title'],
            'synopsis' => $validated['synopsis'],
            'poster' => $validated['poster'],
            'year' => $validated['year'],
            'available' => $validated['available'],
            'genre_id' => $validated['genre_id'],
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie has been successfully created!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $movies = Movies::findOrFail($id);
        $genres = Genres::all();
        return view('movies.edit', compact('movies', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'synopsis' => 'required|string',
            // 'poster' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',  // Validasi file gambar
            'year' => 'required|integer|min:1900|max:' . date('Y'), // Tahun valid
            'available' => 'required|boolean',
            'genre_id' => 'required|exists:genres,id', 
        ]);
        $movies = Movies::findOrFail($id);

        $movies->update([
            'title' => $validated['title'],
            'synopsis' => $validated['synopsis'],
            // 'poster' => $validated['poster'],
            'year' => $validated['year'],
            'available' => $validated['available'],
            'genre_id' => $validated['genre_id'],
        ]);

        return redirect()->route('movies.index')->with('success', 'Movie has been successfully created!');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $movies = Movies::findOrFail($id);
        $movies->delete();

        return redirect()->route('movies.index')->with('success', 'Movie has been successfully deleted!');
    }
}
