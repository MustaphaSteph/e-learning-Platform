@extends('admin.yield')

@section('content')

    <div class="container">


        <div class="row">
            <div class="col-md-11">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">Edit section</div>

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
                        <form role="form" method="POST" action="/admin/course/section/{{$section->id}}">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">
                            <fieldset>
                                <div class="form-group">
                                    <label>Section Title:</label>
                                    <input class="form-control" name="title" id="title" placeholder="Course Title" type="text" value="{{$section->title}}"  required>
                                </div>

                                <div class="form-group">
                                    <label>Section length:</label>
                                    <input class="form-control" name="section_length" id="section_length" placeholder="video length" type="text" value="{{$section->length}}" required>
                                </div>

                                <div>
                                    <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Update</button>
                                    <a class="btn btn-small btn-danger" href="/admin/course/{{$section->course->id}}/show_sections">Cancel</a>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection