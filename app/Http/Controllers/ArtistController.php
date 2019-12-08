<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Genre;
use App\Song;
use Illuminate\Http\Request;

class ArtistController extends Controller
{

    public function byGenre($genre) {
        $objGenre = Genre::where('name', $genre)->first();
        $artistList = Artist::where('genre_id', $objGenre->id)->get();

        return view('artist.home', compact('artistList'));
    }

    public function create()
    {
        $genreList = Genre::all();

        return view("artist.create", compact('genreList'));
    }

    public function store(Request $request)
    {
        $artist = new Artist();
        $artist->name = $request->get('name');
        $artist->photo = $request->get('photo');
        $artist->genre_id= $request->get('genre');
        $artist->save();

        $genreList = Genre::all();
        $artistList = Artist::orderBy('name')->get();
        $songList = Song::all();

        return view('genre.home', compact('genreList', 'artistList', 'songList'));
    }

    public function edit($id)
    {
        $artist = Artist::find($id);
        $genreList = Genre::all();
        return view('artist.edit', compact('artist', 'genreList'));
    }

    public function update(Request $request, $id)
    {
        $artist = Artist::find($id);

        $artist->name = $request->get('name');
        $artist->photo = $request->get('photo');
        $artist->genre_id = $request->get('genre');
        $artist->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $artist = Artist::find($id);
        $artist->delete();

        return redirect('/');
    }
}
