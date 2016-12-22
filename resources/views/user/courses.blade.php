@extends('course.yield')

@section('content')

    <div id="content" class="site-content">
        <div class="page-title parallax-window" data-parallax="scroll" data-image-src="/template/images/placeholder/event-title.jpg">
            <div class="container">
                <h1>Event Grid</h1>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span class="current">Event Grid</span></li>
                    </ul>
                </div><!-- .breadcrumb -->
            </div><!-- .container -->
        </div><!-- .page-title -->
        <div class="container">
            <div class="row">

                @if($courses!=null)
                <main id="main" class="site-main col-md-12">
                    <div class="filter">
                        <ul>
                            <li><a class="active" href="#" data-filter="*">All</a></li>
                            <li><a href="#" data-filter=".paid">Paid</a></li>
                            <li><a href="#" data-filter=".free">Free</a></li>
                        </ul>
                    </div><!-- .filter -->


                    <div class="events layout column-3 isotope">
                        @foreach($courses as $course)

                        <div class="event isotope-item {{ $course->price <= 0 ? 'free' : 'paid' }}">
                            <div class="event-inner shadow">
                                <div class="event-thumb">
                                    <a class="mini-zoom" href="/user/course/{{$course->id}}/course-view"><img src="/images/{{$course->image}}" alt="" /></a>
                                </div>
                                <!-- .event-thumb -->
                                <div class="event-info">
                                    <h3 class="post-title"><a href="/user/course/{{$course->id}}/course-view">{{$course->title}}</a></h3>
                                    <ul class="event-meta">
                                        <li>{{$course->length}}</li>
                                    </ul>
                                </div><!-- .event-info -->
                            </div><!-- .event-inner -->
                        </div><!-- .course -->
                        @endforeach

                    </div><!-- .courses -->

                </main><!-- .site-main -->
                @else
                    <div class="alert alert-info">
                        <strong>Ops!</strong> You didn't enroll to any course yet .
                    </div>
                @endif
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .site-content -->

@endsection