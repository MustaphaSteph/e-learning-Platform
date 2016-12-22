@extends('admin.yield')

@section('content')

    <div class="container">


        <div class="row">
            <div class="col-md-11">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">add section</div>

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
                        <form role="form" method="POST" action="{{url('/admin/course/section')}}">
                            {{ csrf_field() }}

                            <fieldset>
                                <div class="form-group">
                                    <label>Section Title:</label>
                                    <input class="form-control" name="title" id="title" placeholder="Course Title" type="text" required>
                                </div>

                                <div class="form-group">
                                    <label>Section length:</label>
                                    <input class="form-control" name="section_length" id="section_length" placeholder="video length" type="text" required>
                                </div>

                                <div class="form-group">
                                    <input name="course_id" type="hidden" value="{{$course_id}}">
                                </div>

                            <div>
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