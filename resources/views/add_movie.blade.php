<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 12.03.2018
 * Time: 13:10
 */ ?>
@extends ('layouts.app')
@section('scripts')
    <script src="{{asset('vendor/bootstrap-tagsinput/bootstrap-tagsinput.js')}}"></script>

    <script src="{{asset('js/tag-input.js')}}"></script>
    <script src="{{asset('js/country_autocomplete.js')}}"></script>
    <script src="{{asset('js/store_movie.js')}}"></script>


@endsection
@section('content')
    <div class="container">
        <div class="row" style="width: 50%">
            <form action="{{route('store_movie')}}" method="POST" id="store_movie" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label class='form-check-label' for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control">
                    @if ($errors->any())
                        {{$errors->first('title')}}
                    @endif
                </div>

                <div class="form-group">
                    <label class='form-check-label' for="year">Year</label>
                    <input type="number" name="year" id="year" class="form-control" min="1888" max="{{date("Y")}}">
                </div>
                <div class="form-group">
                    <label class='form-check-label' for="description">Description</label>
                    <textarea name="description" id="description" class="form-control"></textarea>
                </div>
                <div class="form-group ">
                    <label class='form-check-label' for="poster">Poster</label>
                    <input type="file" name="poster" accept="image/*" id="poster" class="form-control-file">
                </div>
                <div class="form-group">
                    <label class='form-check-label' for="trailer">Trailer</label>
                    <input type="text" name="trailer" id="trailer" class="form-control">
                    <small id="trailerHelp" class="form-text text-muted">
                        Insert only the YouTube ID of the video, for example, you should use <b>dQw4w9WgXcQ</b> instead
                        of
                        <a target="_blank"
                           href="https://www.youtube.com/watch?v=dQw4w9WgXcQ">https://www.youtube.com/watch?v=<b>dQw4w9WgXcQ</b></a>
                        or <a target="_blank"
                              href="https://youtu.be/dQw4w9WgXcQ">https://youtu.be/<b>dQw4w9WgXcQ</b></a>
                    </small>

                </div>
                <div class="form-group ">
                    <label class='form-check-label' for="country">Country</label>
                    <input type="text" name="country" id="country" autocomplete="off" class="form-control">
                </div>

                <div class="form-group ">
                    <label class='form-check-label' for="genres">Genres</label>
                    <input type="text" name="genres" id="genres" autocomplete="off"
                           class="form-control">
                </div>
                <input type="submit" class="btn btn-primary">Submit</input>
            </form>
        </div>

        @if ($errors->any())

            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

@endsection
