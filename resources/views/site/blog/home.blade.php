@extends('course.yield')

@section('class','blog-list-v2')

@section('content')

    <div id="content" class="site-content">
        <div class="page-title parallax-window" data-parallax="scroll" data-image-src="images/placeholder/blog-title.jpg">
            <div class="container">
                <h1>Blog List Version 2</h1>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span class="current">Blogs</span></li>
                    </ul>
                </div><!-- .breadcrumb -->
            </div><!-- .container -->
        </div><!-- .page-title -->
        <div class="container">
            <div class="row">
                <main id="main" class="site-main col-md-9">
                    <div class="row">

                        @foreach($posts as $post)

                            <article class="col-md-12 post">
                                <div class="inner-post shadow">
                                    <div class="post-thumb">
                                        <a href="single.html" class="mini-zoom"><img src="/images/{{$post->picture}}" alt="" /></a>
                                    </div><!-- .post-thumb -->

                                    <div class="post-info">
                                        <h3 class="post-title"><a href="single.html">{{$post->title}}</a></h3>
                                        <ul class="post-meta">
                                            <li><a href="#"><i class="fa fa-clock-o"></i> {{$post->created_at}}</a></li>
                                            <li><a href="#"><i class="fa fa-user"></i> {{$post->user->name}}</a></li>
                                            <li><a href="#"><i class="fa fa-comment"></i> 16</a></li>
                                        </ul>
                                        <div class="post-desc">


                                        </div><!-- .post-desc -->
                                        <a href="/user/blog/{{$post->id}}" class="link">Read this article</a>
                                    </div><!-- .post-info -->
                                </div><!-- .inner-post -->
                            </article>

                        @endforeach


                    </div>

                </main><!-- .site-main -->

                <div id="sidebar" class="sidebar col-md-3">

                    <aside class="widget courses-widget">
                        <h3 class="widget-title">Random post</h3>
                        <div class="courses">
                            <ul>
                                <li>
                                    <a class="thumb" href="#"><img src="images/placeholder/course-wd1.jpg" alt="" /></a>
                                    <div class="info">
                                        <h4><a href="#">The Secret to Making Money by starting a small business.</a></h4>
                                        <span><i class="fa fa-users"></i> 2289</span>
                                    </div>
                                </li>
                            </ul>
                        </div><!-- .widget -->
                    </aside><!-- .widget -->
                </div><!-- .sidebar -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .site-content -->

    @endsection