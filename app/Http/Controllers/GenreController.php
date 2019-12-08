<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Genre;
use App\Song;
use Illuminate\Http\Request;

class GenreController extends Controller
{

    public function index()
    {
        return view('genre.home', compact('genreList'));
    }

    public function create()
    {
        return view("genre.create");
    }

    public function store(Request $request)
    {
        $genre = new Genre();
        $genre->name = $request->get('name');

        $image = $request->file('image');
        $genre->image = ''; /* '' */
        $genre->save();

        $name = str_slug($genre->id).'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/svg');
        $imagePath = $destinationPath."/".$name;
        $image->move($destinationPath, $name);

        $genre->image = $name;
        $genre->save();

        $genreList = Genre::all();
        $artistList = Artist::orderBy('name')->get();
        $songList = Song::all();

        return view('genre.home', compact('genreList', 'artistList', 'songList'));
    }
}
