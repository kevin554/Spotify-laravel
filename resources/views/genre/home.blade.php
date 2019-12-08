@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                             aria-orientation="vertical">
                            <a class="nav-link" id="v-pills-search-tab" data-toggle="pill" href="#v-pills-search"
                               role="tab" aria-controls="v-pills-search" aria-selected="true">Buscar</a>
                            <a class="nav-link active" id="v-pills-genres-tab" data-toggle="pill" href="#v-pills-genres"
                               role="tab" aria-controls="v-pills-genres" aria-selected="false">Géneros</a>
                            <a class="nav-link" id="v-pills-library-tab" data-toggle="pill" href="#v-pills-library"
                               role="tab" aria-controls="v-pills-library" aria-selected="false">Tu biblioteca</a>
                            <a class="nav-link" id="v-pills-artists-tab" data-toggle="pill" href="#v-pills-artists"
                               role="tab" aria-controls="v-pills-artists" aria-selected="false">Artistas</a>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade" id="v-pills-search" role="tabpanel"
                                 aria-labelledby="v-pills-search-tab">
                                Buscar
                                <form class="form-inline w-100 order-2" method="post" action="index.php">
                                    <input type="hidden" name="task" value="search"/>
                                    <input class="form-control border-left-0 font-weight-bold"
                                           type="search"
                                           style="background: #efefef"
                                           placeholder="Buscar"
                                           name="q"
                                           aria-label="Search"
                                           aria-describedby="basic-addon1">
                                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                                </form>
                            </div>
                            <div class="tab-pane fade show active" id="v-pills-genres" role="tabpanel"
                                 aria-labelledby="v-pills-genres-tab">
                                <div class="row">
                                    @foreach($genreList as $genre)
                                        <div class="col-sm">
                                            <div class="genre">
                                                <img src="{{ asset('svg/'.$genre["image"]) }}" alt="image"
                                                     class="rounded img-fluid image"/>
                                                <div>
                                                    <a class="btn btn-default">
                                                        <img src="{{ asset('svg/pencil-edit-button.svg')}}" width="20" />
                                                    </a>
                                                    <a class="btn btn-default">
                                                        <img src="{{ asset('svg/garbage.svg')}}" width="20" />
                                                    </a>
                                                </div>

                                                <p class="text-center"><b>{{ $genre["name"] }}</b></p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                {{--todo copy the class and remove the material bootstrap--}}
                                <button type="button" class="btn btn-success bmd-btn-fab bottom-right">
                                    <a href="{{url('/genre/create')}}" class="text-white">
                                        <i class="material-icons">add</i>
                                    </a>
                                </button>
                            </div>

                            <div class="tab-pane fade" id="v-pills-library" role="tabpanel"
                                 aria-labelledby="v-pills-library-tab">
                                Tu biblioteca
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>id</td>
                                        <td>title</td>
                                        <td>artist_id</td>
                                        <td>file</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($songList as $song)
                                        <tr>
                                            <td>{{$song["id"]}}</td>
                                            <td>{{$song["title"]}}</td>
                                            <td>{{$song["artist_id"]}}</td>
                                            <td>{{$song["file"]}}</td>
                                            <td>
                                                <a href="/songs/{{$song["id"]}}" class="btn btn-primary">
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
                                                <form method="POST"
                                                      action="{{action('SongController@destroy', $song["id"])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{--todo copy the class and remove the material bootstrap--}}
                                <button type="button" class="btn btn-success bmd-btn-fab bottom-right">
                                    <a href="{{url('/song/create')}}" class="text-white">
                                        <i class="material-icons">add</i>
                                    </a>
                                </button>
                            </div>
                            <div class="tab-pane fade" id="v-pills-artists" role="tabpanel"
                                 aria-labelledby="v-pills-artists-tab">
                                Artistas
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <td>id</td>
                                        <td>name</td>
                                        <td>photo</td>
                                        <td>genre_id</td>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($artistList as $artist)
                                        <tr>
                                            <td>{{$artist["id"]}}</td>
                                            <td>{{$artist["name"]}}</td>
                                            <td>{{$artist["photo"]}}</td>
                                            <td>{{$artist["genre_id"]}}</td>
                                            <td>
                                                <a href="/artist/{{$artist["id"]}}" class="btn btn-primary">
                                                    Edit
                                                </a>
                                            </td>
                                            <td>
                                                <form method="POST"
                                                      action="{{action('ArtistController@destroy', $artist["id"])}}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <input type="submit" class="btn btn-danger" value="Delete">
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                {{--todo copy the class and remove the material bootstrap--}}
                                <button type="button" class="btn btn-success bmd-btn-fab bottom-right">
                                    <a href="{{url('/artist/create')}}" class="text-white">
                                        <i class="material-icons">add</i>
                                    </a>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
