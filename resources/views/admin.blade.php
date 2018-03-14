<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 10.03.2018
 * Time: 18:57
 */ ?>
@extends('layouts.app')
@section('content')
    <div class="container">
        <ul>
            <li><a href="{{route('add_movie')}}">Add a movie</a></li>
        </ul>
    </div>
@endsection
