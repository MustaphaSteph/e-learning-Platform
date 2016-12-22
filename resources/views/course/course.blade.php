@extends('course.yield')

@section('class','left-sidebar')

@section('content')

    <div id="content" class="site-content courses-content">
        <div class="page-title parallax-window" data-parallax="scroll" data-image-src="http://www.hutui6.com/data/out/187/67918609-study-wallpapers.jpeg">
            <div class="container">
                <h1>Courses Grid</h1>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span class="current">Courses</span></li>
                    </ul>
                </div><!-- .breadcrumb -->
            </div><!-- .container -->
        </div><!-- .page-title -->

        <div class="search-by-cat">
            <form action="#" method="get" />
            <div class="container">
                <div class="row">
                    <div class="col-md-3">

                    </div>

                    <div class="col-md-6">
                        <input type="text" placeholder="Enter Keyword" />
                    </div>

                    <div class="col-md-3">
                        <input type="submit" value="Find Course" class="button primary rounded large full" />
                    </div>
                </div>
            </div><!-- .container -->
            </form>
        </div><!-- .search-by-cat -->

        <div class="container">
            <div class="row">
                <main id="main" class="site-main col-md-9">
                    <div class="sort clearfix">
                        <form action="#" class="ordering pull-left" />
                        </form>
                        <div class="style-switch pull-right clearfix">
                            <a class="active" href="#" data-view="grid"><i class="fa fa-th"></i></a>
                            <a href="#" data-view="list"><i class="fa fa-th-list"></i></a>
                        </div>
                    </div><!-- .sort -->

                    <div class="courses layout column-3">

                        @foreach($courses as $course)
                        <div class="course">
                            <div class="course-inner shadow">
                                <div class="course-thumb">
                                    <a class="mini-zoom" href="/user/course/{{$course->id}}/show">
                                        <img src="/images/{{$course->image}}" alt="" />
                                        <img class="img-list" src="/images/{{$course->image}}" alt="" />
                                    </a>
                                </div><!-- .course-thumb -->

                                <div class="course-info">
                                    <h3 class="course-title"><a href="/user/course/{{$course->id}}/show">{{$course->title}}</a></h3>
                                    @if ($course->price <= 0)
                                        <p class="price">
                                            <ins><span class="amount">Free</span></ins>
                                        </p>
                                    @else
                                        <p class="price">
                                            <ins><span class="amount">${{$course->price}}</span></ins>
                                        </p>
                                    @endif
                                    <div class="course-desc">
                                        <p>{{$course->description}}</p>
                                    </div><!-- .course-desc -->

                                    <div class="course-author">
                                        <a href="#"><img height="32" width="32" src="/images/{{$course->user->picture}}" alt="" /></a>
                                        <span>by <a href="#">{{$course->user->name}}</a></span>
                                    </div><!-- .course-author -->

                                    <div class="course-meta">
                                        <ul>
                                            <li><i class="fa fa-users"></i> {{count($course->users)}}</li>
                                            <li><a href="#"><i class="fa fa-eye"></i> {{$course->views}}</a></li>
                                        </ul>
                                    </div><!-- .course-meta -->


                                </div><!-- .course-info -->
                            </div><!-- .course-inner -->
                        </div><!-- .course -->
                        @endforeach

                    </div><!-- .courses -->


                </main><!-- .site-main -->

                <div id="sidebar" class="sidebar col-md-3">
                    <aside>
                        <div class="widget">
                            <h3 class="widget-title">Tags</h3>
                            <div class="tags-cloud">
                               @foreach($tags as $tag)
                                        <a  href="/user/tags/{{$tag->id}}/show">{{$tag->name}}</a>
                                @endforeach
                            </div><!-- .tags-cloud -->
                        </div><!-- .widget -->
                    </aside><!-- .widget -->

                    <aside class="widget courses-widget">
                        <h3 class="widget-title">Popular courses</h3>
                        <div class="courses">
                            <ul>
                                @foreach($courses_views as $course)
                                <li>
                                    <a class="thumb" href="#"><img src="/images/{{$course->image}}" alt="" /></a>
                                    <div class="info">
                                        <h4><a href="/user/course/{{$course->id}}/show">{{$course->title}}</a></h4>
                                        <span><i class="fa fa-eye"></i> {{$course->views}}</span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div><!-- .widget -->
                    </aside><!-- .widget -->

                    <aside class="widget blog-widget">
                        <h3 class="widget-title">Latest Articles</h3>
                        <div class="courses">
                            <ul>
                                @foreach($articles as $article)
                                <li>
                                    <a class="thumb" href="#"><img src="/images/{{$article->picture}}" alt="" /></a>
                                    <div class="info">
                                        <h4><a href="/user/blog/{{$article->id}}">{{$article->title}}</a></h4>
                                    </div>
                                </li>
                                    @endforeach

                            </ul>
                        </div><!-- .widget -->
                    </aside><!-- .blog-widget -->
                </div><!-- .sidebar -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .site-content -->

@endsection



