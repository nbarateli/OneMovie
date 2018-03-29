<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 02.03.2018
 * Time: 11:47
 */ ?>


@extends ('layouts.app')
@section('title')
    <title>{{($term ? $term : $genre) . " - page $page"}}</title>
@endsection
@section('content')
    <div class="general-agileits-w3l">
        <div class="w3l-medile-movies-grids">

            <!-- /movie-browse-agile -->

            <div class="movie-browse-agile">
                <!--/browse-agile-w3ls -->
                <div class="browse-agile-w3ls general-w3ls">
                    <div class="tittle-head">
                        <h4 class="latest-text">{{$term ? $term : $genre}}</h4>
                        <div class="container">
                            <div class="agileits-single-top">
                                <ol class="breadcrumb">
                                    <li><a href="index.html">Home</a></li>
                                    <li class="active">Genres</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="browse-inner">
                            @foreach($movies as $movie)
                                <div class="col-md-2 w3l-movie-gride-agile">
                                    <a href="{{@route('movie',['id'=>$movie->id])}}"
                                       class="hvr-shutter-out-horizontal "><img
                                                src="{{asset($movie->poster)}}"
                                                title="album-name"
                                                class="movie-poster"
                                                alt=" "/>
                                        <div class="w3l-action-icon"><i class="fa fa-play-circle"
                                                                        aria-hidden="true"></i>
                                        </div>
                                    </a>
                                    <div class="mid-1">
                                        <div class="w3l-movie-text">
                                            <h6><a href="{{@route('movie',['id'=>$movie->id])}}">{{$movie->title}}</a>
                                            </h6>
                                        </div>
                                        <div class="mid-2">

                                            <p>{{$movie->year}}</p>
                                            <div class="block-stars">
                                                <ul class="w3l-ratings">
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-star" aria-hidden="true"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-star-half-o" aria-hidden="true"></i></a>
                                                    </li>
                                                    <li><a href="#"><i class="fa fa-star-o" aria-hidden="true"></i></a>
                                                    </li>


                                                </ul>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>

                                    </div>
                                    @if($movie->created_at > date('d.m.Y',strtotime("-3 days")))
                                        <div class="ribben two">
                                            <p>NEW</p>
                                        </div>
                                    @endif
                                </div>
                            @endforeach

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <!--//browse-agile-w3ls -->
                <div class="blog-pagenat-wthree">
                    <ul>

                        @if(array_search($page - 1, $pages))
                            @php($data['page'] = $page - 1)
                            <li><a class="frist" href="{{route($route_name, $data)}}">Prev</a></li>
                        @endif
                        @foreach($pages as $page_n)
                            @php($data['page'] = $page_n)
                            <li><a href="{{route($route_name, $data)
                            }}">{{$page_n}}</a>
                            </li>
                        @endforeach
                        @if(array_search($page + 1, $pages))
                            @php($data['page'] = $page + 1)
                            <li><a class="last" href="{{route($route_name, $data)}}">Next</a></li>
                        @endif
                    </ul>
                </div>
            </div>
            <!-- //movie-browse-agile -->
            <!--body wrapper start-->
            <!--body wrapper start-->

        </div>
        <!-- //w3l-medile-movies-grids -->
    </div>
@endsection