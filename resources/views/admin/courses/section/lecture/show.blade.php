@extends('course.yield')

@section('class','single-blog')

@section('content')
    <div id="content" class="site-content">
        <div class="page-title parallax-window" data-parallax="scroll" data-image-src="images/placeholder/blog-title.jpg">
            <div class="container">
                <h1>Blog Details</h1>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><span class="current">Course Details</span></li>
                    </ul>
                </div><!-- .breadcrumb -->
            </div><!-- .container -->
        </div><!-- .page-title -->
        <div class="container">
            <div class="row">
                <main id="main" class="site-main col-md-12">
                    <div class="row">
                        <article class="col-md-12 post">
                            <div class="inner-post">
                                <div class="post-thumb shadow">
                                    <div class="embed-responsive embed-responsive-16by9">
                                        @if (isset($demo))
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$demo}}"></iframe>
                                        @elseif(isset($lecture))
                                            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{$lecture->link}}"></iframe>
                                        @endif
                                    </div>
                                </div><!-- .post-thumb -->

                                <div class="post-info">



                                    @if (isset($lecture))
                                        <h2 class="post-title">{{$lecture->title}}</h2>
                                    @else
                                        <h2 class="post-title">course overview</h2>
                                    @endif

                                    <ul class="post-meta">
                                        <li><a href="#"><i class="fa fa-clock-o"></i> {{$course->created_at}}</a></li>
                                        <li><a href="#"><i class="fa fa-user"></i> {{$course->user->name}}</a></li>
                                        <li><a href="#"><i class="fa fa-eye"></i> {{$course->views}}</a></li>
                                    </ul>

                                    <div class="entry-footer">
                                        <div class="row">
                                            <div class="col-md-7 col-sm-7 col-xs-7">
													<span class="tags-links">Tags:
                                                        @foreach($course->tags as $tag)
														<a rel="tag" href="#">{{$tag->name}}</a>,
                                                        @endforeach
													</span>
                                            </div>

                                            <div class="col-md-5 col-sm-5 col-xs-5">
                                                <div class="single-share">
                                                    <span>Share:</span>
                                                    <div class="socials">
                                                        <ul>
                                                            <li><a href="#" target="_blank"><i class="fa fa-facebook-square"></i></a></li>
                                                            <li><a href="#" target="_blank"><i class="fa fa-twitter-square"></i></a></li>
                                                            <li><a href="#" target="_blank"><i class="fa fa-google-plus-square"></i></a></li>
                                                        </ul>
                                                    </div>
                                                </div><!-- .single-share -->
                                            </div>
                                        </div><!-- .row -->
                                    </div>

                                    <div>

                                        <!-- Nav tabs -->
                                        <ul class="nav nav-tabs" role="tablist">
                                            <li role="presentation" class="active"><a href="#description" aria-controls="description" role="tab" data-toggle="tab">Description</a></li>
                                            <li role="presentation"><a href="#lectures" aria-controls="lectures" role="tab" data-toggle="tab">Course lectures</a></li>
                                        </ul>

                                        <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div role="tabpanel" class="tab-pane fade in active" id="description">

                                                <div class="post-desc">
                                                   {{$course->description}}
                                                </div><!-- .post-desc -->

                                            </div>
                                            <div role="tabpanel" class="tab-pane fade" id="lectures">

                                                <ul class="course-list-table">

                                                    @foreach($course->section as $s)
                                                        <li>
                                                            <h4>{{$s->title}} <span class="info">Lectures: {{count($s->lecture)}} ,length: {{$s->length}} </span></h4>
                                                            <ul>
                                                                @foreach($s->lecture as $l)
                                                                    <li><a href="/user/course/{{$course->id}}/lecture/{{$l->id}}">{{$l->title}}</a><span class="time">{{$l->length}}</span></li>
                                                                @endforeach
                                                            </ul>
                                                        </li>
                                                    @endforeach
                                                </ul>

                                            </div>

                                            </div>
                                        </div>

                                    </div>





                                    <!-- <div class="posts-together">
                                         <div class="row">
                                             <div class="col-md-6 col-sm-6 col-xs-6">
                                                 <div class="post-together post-prev">
                                                     <a href="#"><i class="fa fa-angle-double-left"></i> Previous
                                                         <span>Back to school with courses of  Universum</span></a>
                                                 </div>
                                             </div>
                                             <div class="col-md-6 col-sm-6 col-xs-6">
                                                 <div class="post-together post-next">
                                                     <a href="#">Next <i class="fa fa-angle-double-right"></i>
                                                         <span>Research works of students about to be start</span></a>
                                                 </div>
                                             </div>
                                         </div>
                                     </div> .post-together -->
                                </div><!-- .post-info -->
                        </article>
                    </div><!-- .inner-post -->
                </main>
                    </div>

                <!-- .site-main -->
            </div><!-- .row -->
        </div><!-- .container -->
@endsection