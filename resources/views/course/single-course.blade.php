@extends('course.yield')

@section('class','single-course v3')

@section('content')

    <div id="content" class="site-content">
        <div class="page-title parallax-window" data-parallax="scroll" data-image-src="images/placeholder/course-title.jpg">
            <div class="container">
                <h1>Course Details</h1>
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
                <div id="main" class="site-main col-md-9">
                    <h1 class="post-title">{{$course->title}}</h1>
                    <ul class="post-meta">
                        <li><a href="#"><i class="fa fa-user"></i> {{$course->user->name}}</a></li>
                        <li><a href="#"><i class="fa fa-clock-o"></i> {{$course->created_at}}</a></li>
                    </ul>

                    <a data-gal="prettyPhoto" href="https://www.youtube.com/watch?v=1GaMGdOQLvg" class="video">
                        <img src="/images/{{$course->image}}" alt="" />
                    </a><!-- .video -->
                    <br />
                    <div class="post-desc">
                        <h4>Introduction : </h4>
                        <p>{{$course->introduction}}</p>
                    </div><!-- .post-desc -->

                    <div class="post-desc">
                        <h4>Description : </h4>
                        <p>{{$course->description}}</p>
                    </div><!-- .post-desc -->

                    <div class="post-desc">
                        <h4>Requirement : </h4>
                        <p>{{$course->requirement}}</p>
                    </div><!-- .post-desc -->

                    <h4> Course : </h4>
                    <br/>
                    <ul class="course-list-table">
                        @foreach($course->section as $s)
                        <li>
                            <h4>{{$s->title}} <span class="info">length : {{$s->length}}</span></h4>
                            <ul>
                                @foreach($s->lecture as $l)
                                <li>{{$l->title}}<span class="time">{{$l->length}}</span></li>
                                @endforeach
                            </ul>
                        </li>
                        @endforeach
                    </ul>
                    @if (count($errors) > 0)
                            <!-- Form Error List -->
                    <div class="alert alert-danger">
                        <strong>Whoops! Something went wrong!</strong>

                        <br><br>

                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <h2 class="title">Course reviews</h2>

                    <div id="reviews">
                        <div class="ratings-counter">
                            <div class="avegare">
                                <div class="star-rating normal">
                                    <span style="width: {{$rating }}%"> </span>
                                </div>

                                <span>based on {{$total_rat }} ratings</span>
                            </div><!-- .avegare -->
                        </div><!-- .ratings-counter -->

                        <div class="comments-area" id="comments">
                            <ol class="comment-list">

                                @foreach($course->users as $review)
                                  @if($review->pivot->rating)
                                <li class="comment">
                                    <div class="comment-body">
                                        <div class="comment-avatar">
                                            <img class="avatar" src="/images/{{$review->picture}}" alt="" />
                                        </div><!-- .comment-avatar -->
                                        <header class="comment-meta">
                                            <cite class="comment-author"><a href="#"></a> {{$review->name}}  :  </cite>
                                            <div class="star-rating normal">
                                                <span style="width: {{$review->pivot->rating*20}}%"> </span>
                                            </div>
                                            <!--<span class="comment-date">- Feb 25, 2016</span>-->
                                        </header><!-- .comment-meta -->
                                        <div class="comment-content comment">
                                            <p>{{$review->pivot->comment}}</p>
                                        </div> <!-- .comment-content -->
                                    </div><!-- .comment-body -->
                                </li><!-- .comment -->
                                    @endif
                                @endforeach

                            </ol><!-- .comment-list -->

                            <div class="comment-respond" id="respond">
                                <h3 class="comment-reply-title" id="reply-title">Add a review</h3>
                                <form novalidate="" class="comment-form" id="commentform" method="post" action="" >
                                    {{ csrf_field() }}
                                    <input name="course_id" type="hidden" value="{{$course->id}}">
                                <p class="comment-form-rating">
                                    <label>Your Rating:</label>
										<span class="comment-rating">
											<a class="one-star" href="#" data-rating="1"></a>
											<a class="two-star" href="#" data-rating="2"></a>
											<a class="three-star" href="#" data-rating="3"></a>
											<a class="four-star" href="#" data-rating="4"></a>
											<a class="five-star" href="#" data-rating="5"></a>
											<input type="hidden" name="comment-rating" />
										</span><!-- .comment-rating -->
                                </p>
                                <p class="comment-form-comment">
                                    <label for="comment">Your Comment:</label>
                                    <textarea id="comment" name="comment" cols="45" rows="2" aria-required="true"></textarea>
                                </p>
                                <p class="form-submit">
                                    <label for="submit">Submit</label>
                                    <input name="submit" type="submit" id="submit" class="button medium primary rounded" value="Submit" />
                                </p>
                                </form>
                            </div> <!-- #respond -->
                        </div><!-- .comments-area -->
                    </div>
                     <!-- #respond -->
                </div><!-- .site-main -->

                <div class="col-md-3 sidebar">
                    <aside class="widget appply-form">

                        @if($apply==='yes')
                            <a href="/user/course/{{$course->id}}/course-view" class="button large full primary rounded apply-button">Watch it</a>
                        @else
                            <a href="/user/course/{{$course->id}}/course-view" class="button large full primary rounded apply-button">Apply now</a>
                        @endif

                        <div class="course-detail">
                            <ul>
                                @if ($course->price <= 0)
                                    <li>Price: <span class="price">Free</span></li>
                                @else
                                    <li>Price: <span class="price">${{$course->price}}</span></li>
                                @endif
                                <li>Sections:  {{$course->section()->count()}}</li>
                                <li>Length:  {{$course->length}}</li>
                                <li>
                                    <div class="star-rating">
                                        <span style="width:{{$rating}}%"></span>
                                    </div>
                                    <span>({{$total_rat}} reviews)</span>
                                </li>
                            </ul>
                        </div>
                    </aside>

                    <aside class="widget teacher-widget">
                        <h3 class="widget-title">Teacher</h3>
                        <div class="speaker">
                            <div class="speaker-thumb">
                                <img src="/images/{{$course->user->picture}}" alt="" />
                            </div><!-- .speaker-thumb -->

                            <div class="speaker-info">
                                <span class="name">{{$course->user->name}}</span>
                                <p>Contact me if you have any problems</p>
                            </div><!-- .speaker-info -->
                            <div class="socials">
                                <ul>
                                    <li><a href="#" target="_blank"><i class="fa fa-facebook"></i>{{$course->user->facebook}}</a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-twitter"></i>{{$course->user->twitter}}</a></li>
                                    <li><a href="#" target="_blank"><i class="fa fa-linkedin "></i>{{$course->user->linkedin}}</a></li>
                                </ul>
                            </div>
                        </div>
                    </aside>
                </div><!-- .sidebar -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .site-content -->

@endsection