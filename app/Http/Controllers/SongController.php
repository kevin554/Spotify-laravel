<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Song;
use Illuminate\Http\Request;

class SongController extends Controller
{

    public function byArtist($artist) {
        // todo send the artist name in the url $journalName = preg_replace('/\s+/', '_', $journalName);
        // $objArtist = Artist::where('name', $artist)->first();
        $songList = Song::where('artist_id', $artist)->get();

        return view('song.home', compact('songList'));
    }

    public function create()
    {
        $artistList = Artist::all();

        return view("song.create", compact('artistList'));
    }

    public function store(Request $request)
    {
        $song = new Song();
        $song->title = $request->get('title');
        $song->artist_id = $request->get('artist');
        $song->file = $request->get('file');
        $song->save();

        return redirect('/');
    }

    public function edit($id)
    {
        $song = Song::find($id);
        $artistList = Artist::all();
        return view('song.edit', compact('song', 'artistList'));
    }

    public function update(Request $request, $id)
    {
        $song = Song::find($id);

        $song->title = $request->get('title');
        $song->artist_id = $request->get('artist');
        $song->file = $request->get('file');
        $song->save();

        return redirect('/');
    }

    public function destroy($id)
    {
        $song = Song::find($id);
        $song->delete();

        return redirect('/');
    }
}
