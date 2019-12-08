@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <form method="POST" action="{{action('GenreController@store')}}" enctype="multipart/form-data">
                    {{--this is obligatory for security reasons--}}
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">Name:</label>
                        <input id="name" type="text" class="form-control" name="name">
                    </div>
                    <div class="form-group">
                        <label for="image" class="col-form-label">Image:</label>
                        <!-- image-preview-filename input [CUT FROM HERE]-->
                        <div class="input-group image-preview">
                            <input type="text" class="form-control image-preview-filename" disabled="disabled">
                            <span class="input-group-btn">
                            <!-- image-preview-clear button -->
                            <button type="button" class="btn btn-default image-preview-clear" style="display:none;">
                                <span class="glyphicon glyphicon-remove"></span> Clear
                            </button>
                            <!-- image-preview-input -->
                            <div class="btn btn-default image-preview-input">
                                <span class="glyphicon glyphicon-folder-open"></span>
                                <span class="image-preview-input-title">Browse</span>
                                <input type="file" accept="image/png, image/jpeg, image/gif" name="image"/>
                            </div>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Create!">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
