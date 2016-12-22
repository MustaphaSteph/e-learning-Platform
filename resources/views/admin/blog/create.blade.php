@extends('admin.yield')

@section('links')
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
    <script>
        tinymce.init({ selector:'textarea',
            menubar:false
        });</script>
    @endsection
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <h2>New post blog</h2>
                        </div>

                        <div class="panel-options">
                            <a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
                            <a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
                        </div>
                    </div>

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

                    <div class="panel-body">
                        <form role="form" method="POST" action="{{url('/admin/blog')}}" enctype="multipart/form-data">
                            {{ csrf_field() }}

                            <fieldset>
                                <div class="form-group col-md-7">
                                    <label>Title:</label>
                                    <input class="form-control" name="title" id="title" placeholder="title" type="text">
                                </div>

                                <div class="form-group col-md-2">
                                    <label >time to read:</label>
                                    <input class="form-control " name="time" id="time" placeholder="time to read" type="text">
                                </div>

                                <div class="form-group col-md-2">
                                    <label >image:</label>
                                    <input class="form-control " name="image" id="image" type="file">
                                </div>

                                <div class="form-group col-md-12">
                                    <label>Content:</label>
                                    <textarea class="form-control" name="content" id="content" placeholder="put your content here"></textarea>
                                </div>



                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary"> <i class="fa fa-save"></i> Submit</button>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection