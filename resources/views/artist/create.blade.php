@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{action('ArtistController@store')}}">
                    {{--this is obligatory for security reasons--}}
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name:</label>
                        <input id="name" type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="photo" class="col-form-label">Photo:</label>
                        <input id="photo" type="text" class="form-control" name="photo">
                    </div>
                    <div class="form-group">
                        <label>Genre:</label>
                        <select id="genre" class="form-control" name="genre" required="required">
                            <option value="">Select the genre:</option>
                            @foreach($genreList as $genre)
                                <option value="{{$genre["id"]}}">{{$genre["name"]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Create!">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
