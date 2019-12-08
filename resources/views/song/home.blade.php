@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-md-12">
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
