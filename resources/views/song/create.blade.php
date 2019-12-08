@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{action('SongController@store')}}">
                    {{--this is obligatory for security reasons--}}
                    @csrf
                    <div class="form-group">
                        <label for="title" class="col-form-label">Title:</label>
                        <input id="title" type="text" class="form-control" name="title">
                    </div>
                    <div class="form-group">
                        <label>Artist:</label>
                        <select id="artist" class="form-control" name="artist" required="required">
                            <option value="">Select the artist:</option>
                            @foreach($artistList as $artist)
                                <option value="{{$artist["id"]}}">{{$artist["name"]}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file" class="col-form-label">File:</label>
                        <input id="file" type="text" class="form-control" name="file">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Create!">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
