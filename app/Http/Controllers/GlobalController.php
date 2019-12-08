<?php

namespace App\Http\Controllers;

use App\Artist;
use App\Genre;
use App\Song;
use Illuminate\Http\Request;

class GlobalController extends Controller
{

    public function index() {
        $genreList = Genre::all();
        $artistList = Artist::orderBy('name')->get();
        $songList = Song::all();

        return view('genre.home', compact('genreList', 'artistList', 'songList'));
    }

    public function search($q) {
        $songList = Song::where('title', 'like', '%', $q);
        $artistList = Artist::where('name', 'like', '%', $q);

        array_push($songList, $artistList);

        return $songList;
    }

}
