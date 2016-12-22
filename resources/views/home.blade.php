@extends('layouts.app')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">

                    <div class="panel-body">

                        <header class="jumbotron hero-spacer">
                            <h1>A Warm Welcome!</h1>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
                            <p><a class="btn btn-primary btn-large">Call to action!</a>
                            </p>
                        </header>

                        <hr>

                        <!-- Title -->
                        <div class="row">
                            <div class="col-lg-12">
                                <h3>Our courses</h3>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- Page Features -->
                        <div class="row text-center">

                            @foreach($courses as $course)
                                <div class="col-md-3 col-sm-6 hero-feature">
                                    <div class="thumbnail">
                                        <img src="/images/image.png" alt="">
                                        <div class="caption">
                                            <h3>{{$course->title}}</h3>
                                            <p> Length : {{$course->length}}</p>
                                            <p> time : {{$course->created_at}}</p>
                                            <p>
                                                <a href="/user/course/{{$course->id}}/show" class="btn btn-primary">Show</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <!-- /.row -->

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
