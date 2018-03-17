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
                    <input type="text" value="{{old('title') ? old('title') :''}}" name="title" id="title"
                           class="form-control">
                    <small class="error alert-danger">{{$errors->first('title')}}</small>
                </div>

                <div class="form-group">
                    <label class='form-check-label' for="year">Year</label>
                    <input type="number" value="{{old('year') ? old('year') :''}}" name="year" id="year"
                           class="form-control" min="1888" max="{{date("Y")}}">
                    <small class="error alert-danger">{{$errors->first('year')}}</small>
                </div>
                <div class="form-group">
                    <label class='form-check-label' for="description">Description</label>
                    <textarea name="description" value="{{old('description') ? old('description') :''}}"
                              id="description"
                              class="form-control"></textarea>
                    <small class="error alert-danger">{{$errors->first('description')}}</small>
                </div>
                <div class="form-group ">
                    <label class='form-check-label' for="poster">Poster</label>
                    <input type="file" value="{{old('poster') ? old('poster') :''}}" name="poster" accept="image/*"
                           id="poster" class="form-control-file">
                    <small class="error alert-danger">{{$errors->first('poster')}}</small>
                </div>
                <div class="form-group">
                    <label class='form-check-label' for="trailer">Trailer</label>
                    <input type="text" value="{{old('trailer') ? old('trailer') :''}}" name="trailer" id="trailer"
                           class="form-control">
                    <small class="error alert-danger">{{$errors->first('trailer')}}</small>
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
                    <input type="text" value="{{old('country') ? old('country') : ''}}" name="country" id="country"
                           autocomplete="off" class="form-control">
                    <small class="error">{{$errors->first('country')}}</small>
                </div>

                <div class="form-group ">
                    <label class='form-check-label' for="genres">Genres</label>
                    <input type="text" value="{{old('genres') ? old('genres') :''}}" name="genres" id="genres"
                           autocomplete="off"
                           class="form-control">
                    <small class="error alert-danger">{{$errors->first('genres')}}</small>
                </div>
                <input type="submit" class="btn btn-primary" value="Submit">
            </form>
        </div>
    </div>

@endsection
