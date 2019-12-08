@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
