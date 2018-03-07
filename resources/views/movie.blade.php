<?php
/**
 * Created by PhpStorm.
 * User: Niko
 * Date: 03.03.2018
 * Time: 00:24
 */ ?>
@extends('layouts.app')

@section('content')
    <div class="single-page-agile-main">
        <div class="single-page-agile-info">
            <div class="container">
                <div class="show-top-grids-w3lagile">
                    <div class="col-sm-8 single-left">
                        <div class="song">
                            <div class="song-info">
                                <h3>{{$movie->title}}</h3>
                            </div>
                            <div class="video-grid-single-page-agileits">
                                <div data-video="{{$movie->trailer}}" id="video"><img src="{{asset($movie->poster)}}"
                                                                                      alt=""
                                                                                      class="img-responsive trailer-poster"/>
                                </div>
                            </div>
                        </div>
                        <div class="song-grid-right">
                            <label for="year">Year:</label>
                            <span id='year'>{{$movie->year}}</span>
                            <br>
                            <label for="genre">Genre{{count($movie->genres) != 1 ? 's' : ''}}: </label>
                            <span id="genre">{{implode(', ',array_column($movie->genres->all(), 'genre_name'))}}</span>

                        </div>
                        <div class="song-grid-right">
                            <div class="share">
                                <h5>Share this</h5>
                                <div class="single-agile-shar-buttons">
                                    <ul>
                                        <li>
                                            <div class="fb-like" data-href="https://www.facebook.com/w3layouts"
                                                 data-layout="button_count"
                                                 data-action="like" data-size="small" data-show-faces="false"
                                                 data-share="false"></div>
                                            <script>(function (d, s, id) {
                                                    var js, fjs = d.getElementsByTagName(s)[0];
                                                    if (d.getElementById(id)) return;
                                                    js = d.createElement(s);
                                                    js.id = id;
                                                    js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.7";
                                                    fjs.parentNode.insertBefore(js, fjs);
                                                }(document, 'script', 'facebook-jssdk'));</script>
                                        </li>
                                        <li>
                                            <div class="fb-share-button" data-href="https://www.facebook.com/w3layouts"
                                                 data-layout="button_count" data-size="small" data-mobile-iframe="true">
                                                <a
                                                        class="fb-xfbml-parse-ignore" target="_blank"
                                                        href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.facebook.com%2Fw3layouts&amp;src=sdkpreparse">Share</a>
                                            </div>
                                        </li>
                                        <li class="news-twitter">
                                            <a href="https://twitter.com/w3layouts" class="twitter-follow-button"
                                               data-show-count="false">Follow
                                                @w3layouts</a>
                                            <script async src="//platform.twitter.com/widgets.js"
                                                    charset="utf-8"></script>
                                        </li>
                                        <li>
                                            <a href="https://twitter.com/intent/tweet?screen_name=w3layouts"
                                               class="twitter-mention-button"
                                               data-show-count="false">Tweet to @w3layouts</a>
                                            <script async src="//platform.twitter.com/widgets.js"
                                                    charset="utf-8"></script>
                                        </li>
                                        <li>
                                            <!-- Place this tag where you want the +1 button to render. -->
                                            <div class="g-plusone" data-size="medium"></div>

                                            <!-- Place this tag after the last +1 button tag. -->
                                            <script type="text/javascript">
                                                (function () {
                                                    var po = document.createElement('script');
                                                    po.type = 'text/javascript';
                                                    po.async = true;
                                                    po.src = 'https://apis.google.com/js/platform.js';
                                                    var s = document.getElementsByTagName('script')[0];
                                                    s.parentNode.insertBefore(po, s);
                                                })();
                                            </script>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                        <div class="all-comments">
                            <div class="all-comments-info">
                                <a href="#">Comments</a>
                                <div class="agile-info-wthree-box">
                                    <form>

                                        <textarea placeholder="Message" required=""></textarea>
                                        <input type="submit" value="SEND">
                                        <div class="clearfix"></div>
                                    </form>
                                </div>
                            </div>
                            <div class="media-grids">
                                <div class="media">
                                    <h5>TOM BROWN</h5>
                                    <div class="media-left">
                                        <a href="#">
                                            <img src="images/user.jpg" title="One movies" alt=" "/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium
                                            hendrerit
                                            maecenas
                                            imperdiet ipsum id ex pretium hendrerit</p>
                                        <span>View all posts by :<a href="#"> Admin </a></span>
                                    </div>
                                </div>
                                <div class="media">
                                    <h5>MARK JOHNSON</h5>
                                    <div class="media-left">
                                        <a href="#">
                                            <img src="images/user.jpg" title="One movies" alt=" "/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium
                                            hendrerit
                                            maecenas
                                            imperdiet ipsum id ex pretium hendrerit</p>
                                        <span>View all posts by :<a href="#"> Admin </a></span>
                                    </div>
                                </div>
                                <div class="media">
                                    <h5>STEVEN SMITH</h5>
                                    <div class="media-left">
                                        <a href="#">
                                            <img src="images/user.jpg" title="One movies" alt=" "/>
                                        </a>
                                    </div>
                                    <div class="media-body">
                                        <p>Maecenas ultricies rhoncus tincidunt maecenas imperdiet ipsum id ex pretium
                                            hendrerit
                                            maecenas
                                            imperdiet ipsum id ex pretium hendrerit</p>
                                        <span>View all posts by :<a href="#"> Admin </a></span>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 single-right">
                        <h3>Up Next</h3>
                        <div class="single-grid-right">
                            <div class="single-right-grids">
                                <div class="col-md-4 single-right-grid-left">
                                    <a href="single.html"><img src="images/m1.jpg" alt=""/></a>
                                </div>
                                <div class="col-md-8 single-right-grid-right">
                                    <a href="single.html" class="title"> Nullam interdum metus</a>
                                    <p class="author"><a href="#" class="author">John Maniya</a></p>
                                    <p class="views">2,114,200 views</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="single-right-grids">
                                <div class="col-md-4 single-right-grid-left">
                                    <a href="single.html"><img src="images/m2.jpg" alt=""/></a>
                                </div>
                                <div class="col-md-8 single-right-grid-right">
                                    <a href="single.html" class="title"> Nullam interdum metus</a>
                                    <p class="author"><a href="#" class="author">John Maniya</a></p>
                                    <p class="views">2,114,200 views </p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="single-right-grids">
                                <div class="col-md-4 single-right-grid-left">
                                    <a href="single.html"><img src="images/m3.jpg" alt=""/></a>
                                </div>
                                <div class="col-md-8 single-right-grid-right">
                                    <a href="single.html" class="title"> Nullam interdum metus</a>
                                    <p class="author"><a href="#" class="author">John Maniya</a></p>
                                    <p class="views">2,114,200 views</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="single-right-grids">
                                <div class="col-md-4 single-right-grid-left">
                                    <a href="single.html"><img src="images/m4.jpg" alt=""/></a>
                                </div>
                                <div class="col-md-8 single-right-grid-right">
                                    <a href="single.html" class="title"> Nullam interdum metus</a>
                                    <p class="author"><a href="#" class="author">John Maniya</a></p>
                                    <p class="views">2,114,200 views</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="single-right-grids">
                                <div class="col-md-4 single-right-grid-left">
                                    <a href="single.html"><img src="images/m5.jpg" alt=""/></a>
                                </div>
                                <div class="col-md-8 single-right-grid-right">
                                    <a href="single.html" class="title"> Nullam interdum metus</a>
                                    <p class="author"><a href="#" class="author">John Maniya</a></p>
                                    <p class="views">2,114,200 views</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="single-right-grids">
                                <div class="col-md-4 single-right-grid-left">
                                    <a href="single.html"><img src="images/c5.jpg" alt=""/></a>
                                </div>
                                <div class="col-md-8 single-right-grid-right">
                                    <a href="single.html" class="title"> Nullam interdum metus</a>
                                    <p class="author"><a href="#" class="author">John Maniya</a></p>
                                    <p class="views">2,114,200 views</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="single-right-grids">
                                <div class="col-md-4 single-right-grid-left">
                                    <a href="single.html"><img src="images/m6.jpg" alt=""/></a>
                                </div>
                                <div class="col-md-8 single-right-grid-right">
                                    <a href="single.html" class="title"> Nullam interdum metus</a>
                                    <p class="author">By <a href="#" class="author">John Maniya</a></p>
                                    <p class="views">2,114,200 views</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="single-right-grids">
                                <div class="col-md-4 single-right-grid-left">
                                    <a href="single.html"><img src="images/m15.jpg" alt=""/></a>
                                </div>
                                <div class="col-md-8 single-right-grid-right">
                                    <a href="single.html" class="title"> Nullam interdum metus</a>
                                    <p class="author">By <a href="#" class="author">John Maniya</a></p>
                                    <p class="views">2,114,200 views</p>
                                </div>
                                <div class="clearfix"></div>
                            </div>

                        </div>
                    </div>


                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{asset('js/simplePlayer.js')}}"></script>
    <script>
        $("document").ready(function () {
            $("#video").simplePlayer();
        });
    </script>
@endsection
