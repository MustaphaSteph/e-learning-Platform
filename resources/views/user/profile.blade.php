@extends('course.yield')

@section('class','single-course')

@section('content')

    <div id="content" class="site-content">
        <div class="single-course-title">
            <div class="container">
                <div class="row">
                    <div class="thumb">
                        <img src="/images/{{$user->picture}}" alt="" />
                    </div><!-- .thumb -->

                    <div class="info">
                        <h1 data-name="{{$user->name}}">UserName : {{$user->name}}</h1>

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

                        @if (session('message'))

                            <div class="alert alert-success alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                <strong>Success : </strong> {{ session('message') }}.
                            </div>

                        @endif

                        <ul class="list-group">
                            <li class="list-group-item active">Personal information: </li>
                            <li class="list-group-item" data-full="{{$user->full_name}}">Full Name: {{$user->full_name}}</li>
                        </ul>


                        <ul class="list-group">
                            <li class="list-group-item active">Contact information: </li>
                            <li class="list-group-item" >Email: {{$user->email}}</li>
                            <li class="list-group-item" >Facebook: {{$user->facebook}}</li>
                            <li class="list-group-item" >Twitter: {{$user->twitter}}</li>
                            <li class="list-group-item" >Linkedin: {{$user->linkedin}}</li>
                        </ul>

                        <ul class="list-group">
                            <li class="list-group-item active">Card information: </li>
                            <li class="list-group-item">Card brand: {{$user->card_brand}}</li>
                            <li class="list-group-item">Last Numbers: {{$user->card_last_four}}</li>
                        </ul>

                             @if($user->subscription('main')->cancelled())
                            <ul class="list-group">
                                <li class="list-group-item active">Subscription: </li>
                                <li class="list-group-item">plan: {{$user->subscription('main')->stripe_plan}} CANCELED</li>
                                <li class="list-group-item">ends_at: </li>
                                <li class="list-group-item">Created_at: </li>
                            </ul>
                            @else
                            <ul class="list-group">
                                <li class="list-group-item active">Subscription: </li>
                                <li class="list-group-item">plan: {{$user->subscription('main')->stripe_plan}}</li>
                                <li class="list-group-item">ends_at: {{$user->subscription('main')->ends_at}}</li>
                                <li class="list-group-item">Created_at: {{$user->subscription('main')->updated_at}}</li>
                            </ul>
                            @endif

                        @if($user->subscription('main')->cancelled())
                        <a href="#" class="btn btn-lg btn-primary " data-toggle="modal" data-target="#myModal"
                           data-full="{{$user->full_name}}"
                           data-name="{{$user->name}}"
                           data-email="{{$user->email}}"
                           data-linkedin="{{$user->linkedin}}"
                           data-facebook="{{$user->facebook}}"
                           data-twitter="{{$user->twitter}}"
                        >Update profile</a>
                        <a href="/user/profile/active_subscription" class="btn btn-lg btn-warning " onclick="return confirm('Are you sure you want to active your subscription?');">active subscription</a>
                        @else
                            <a href="#" class="btn btn-lg btn-primary "
                               data-image="{{$user->picture}}"
                               data-full="{{$user->full_name}}"
                               data-name="{{$user->name}}"
                               data-email="{{$user->email}}"
                               data-linkedin="{{$user->linkedin}}"
                               data-facebook="{{$user->facebook}}"
                               data-twitter="{{$user->twitter}}"
                               data-toggle="modal" data-target="#myModal">Update profile</a>
                            <a href="/user/profile/upgrade_subscription" class="btn btn-lg btn-success " onclick="return confirm('Are you sure you want to upgrade your subscription?');">Upgrade subscription</a>
                            <a href="/user/profile/cancel_subscription" class="btn btn-lg btn-danger " onclick="return confirm('Are you sure you want cancel your subscription?');">cancel subscription</a>
                        @endif
                    </div><!-- .info -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .single-course-title -->

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">edit Profile</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" enctype="multipart/form-data" >
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">
                            <div class="form-group">
                                <label for="username" class="form-control-label">username:</label>
                                <input type="text" name="username" class="form-control" id="username" required>
                            </div>
                            <div class="form-group">
                                <label for="full_name" class="form-control-label">full name:</label>
                                <input type="text" name="full_name" class="form-control" id="full_name" required>
                            </div>
                            <div class="form-group">
                                <label for="facebook" class="form-control-label">Facebook:</label>
                                <input type="text" name="facebook" class="form-control" id="facebook" >
                            </div>
                            <div class="form-group">
                                <label for="twitter" class="form-control-label">Twitter:</label>
                                <input type="text" name="twitter" class="form-control" id="twitter" >
                            </div>
                            <div class="form-group">
                                <label for="linkedin" class="form-control-label">Linkedin:</label>
                                <input type="text" name="linkedin" class="form-control" id="linkedin" >
                            </div>
                            <div class="form-group">
                                <label for="email" class="form-control-label">email:</label>
                                <input type="email" name="email" class="form-control" id="email" required>
                            </div>

                            <div class="form-group">
                                <label for="picture" class="form-control-label">email:</label>
                                <input type="file" name="picture" class="form-control" id="picture">
                                <p class="help-block">
                                    Change your profile picture.
                                </p>
                            </div>

                            <button type="submit" class="btn btn-primary">Save changes</button>
                        </form>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                    </div>
                </div>
            </div>
        </div>

    </div><!-- .site-content -->
    @endsection

@section('js')

    <script type="text/javascript">
        $('#myModal').on('show.bs.modal', function (event) {

            var button = $(event.relatedTarget); // Button that triggered the modal

            var username = button.data('name'); // Extract info from data-* attributes
            var full_name = button.data('full'); // Extract info from data-* attributes
            var email = button.data('email'); // Extract info from data-* attributes
            var twitter = button.data('twitter'); // Extract info from data-* attributes
            var linkedin = button.data('linkedin'); // Extract info from data-* attributes
            var facebook = button.data('facebook'); // Extract info from data-* attributes

            // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
            // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

            $('#username').val(username);
            $('#email').val(email);
            $('#facebook').val(facebook);
            $('#twitter').val(twitter);
            $('#linkedin').val(linkedin);
            $('#full_name').val(full_name);

        });
    </script>

@endsection