@extends('course.yield')

@section('class','shop-fullwidth')

@section('css')
    <link rel="stylesheet" href="/template/plans/css/pricing-box.css" type="text/css" media="screen" />
@endsection

@section('content')

    <div id="content" class="site-content">
        <div class="page-title parallax-window" data-parallax="scroll" data-image-src="http://www.planwallpaper.com/static/images/HD-Wallpapers-13.jpg">
            <div class="container">
                <h1>Pricing</h1>
                <div class="breadcrumb">
                    <ul>
                        <li><a href="#">User</a></li>
                        <li><span class="current">Plans</span></li>
                    </ul>
                </div><!-- .breadcrumb -->
            </div><!-- .container -->
        </div><!-- .page-title -->

    <div class="container">
        <div class="row ">
            @if (session('message'))

                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <strong>Alert : </strong> {{ session('message') }}.
                </div>

            @endif

            <div class="col-xs-12 col-md-4">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Starter</h3>
                    </div>
                    <div class="panel-body">
                        <div class="the-price">
                            <h1>
                                $2<span class="subscript">/ day</span></h1>
                        </div>
                        <table class="table">
                            <tr>
                                <td>
                                    Only one course
                                </td>
                            </tr>
                            <tr class="active">
                                <td>
                                    No source code provided
                                </td>
                            </tr>
                            <tr>
                                <td>
                                   No support
                                </td>
                            </tr>

                            <tr class="active">
                                <td>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="panel-footer">
                        <a href="/user/plans/Starter" class="btn btn-success" role="button">Sign Up</a>
                        </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="panel panel-success">
                    <div class="cnrflash">
                        <div class="cnrflash-inner">
                        <span class="cnrflash-label">MOST
                            <br>
                            POPULR</span>
                        </div>
                    </div>
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Ninja</h3>
                    </div>
                    <div class="panel-body">
                        <div class="the-price">
                            <h1>
                                $10<span class="subscript">/ month</span></h1>
                        </div>
                        <table class="table">
                            <tr>
                                <td>
                                    Only 5 courses included
                                </td>
                            </tr>
                            <tr class="active">
                                <td>
                                    source code provided
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    support
                                </td>
                            </tr>
                            <tr class="active">
                                <td>
                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="panel-footer">
                        <a href="/user/plans/Ninja" class="btn btn-success" role="button">Sign Up</a>
                        </div>
                </div>
            </div>
            <div class="col-xs-12 col-md-4">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <h3 class="panel-title">
                            Hero</h3>
                    </div>
                    <div class="panel-body">
                        <div class="the-price">
                            <h1>
                                $90<span class="subscript">/ year</span></h1>
                        </div>
                        <table class="table">
                            <tr>
                                <td>
                                    Full access to all courses
                                </td>
                            </tr>
                            <tr class="active">
                                <td>
                                    source code provided
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Pro support
                                </td>
                            </tr>
                            <tr class="active">
                                <td>
                                    1 month FREE trial
                                </td>
                            </tr>

                        </table>
                    </div>
                    <div class="panel-footer">
                        <a href="/user/plans/Hero" class="btn btn-success" role="button">Sign Up</a>
                        </div>
                </div>
            </div>
        </div>
    </div>


</div>
        <div class="cleared"></div>

@endsection

@section('js')

    <script src="//js.pusher.com/3.0/pusher.min.js"></script>
    <script>
        Pusher.log = function(msg) {
            console.log(msg);
        };

        var pusher = new Pusher("{{env("PUSHER_KEY")}}");
        var channel = pusher.subscribe('notification-channel');
        channel.bind('new-notification', function(data) {
            alert(data.text);
        });
    </script>

@endsection
