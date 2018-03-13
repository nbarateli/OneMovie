@extends('layouts.app')

@section('content')
    <div class="container">
        <h3>{{$message}}</h3>
        @if(!empty($data['sender_path']))
            <a href="{{$sender_path}}">Go Back</a>
        @endif
    </div>
@endsection
