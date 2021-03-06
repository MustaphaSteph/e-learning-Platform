@extends('admin.yield')


@section('css')
    <link href="/css/select2.min.css" rel="stylesheet">
@endsection
@section('content')

    <div class="container">


        <div class="row">
            <div class="col-md-11">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">Course Edit</div>

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
                        <form role="form" method="POST" action="/admin/course/{{$course->id}}" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <input name="_method" type="hidden" value="PUT">
                            <fieldset>
                                <div class="form-group">
                                    <label>Course Title:</label>
                                    <input class="form-control" name="title" id="title" placeholder="Course Title" type="text" value="{{$course->title}}" required>
                                </div>

                                <div class="form-group">
                                    <label>Course Introduction:</label>
                                    <textarea class="form-control" name="introduction" placeholder="Course Description" rows="5" required>{{$course->introduction}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Course Description:</label>
                                    <textarea class="form-control" name="description" placeholder="Course Description" rows="5" required>{{$course->description}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Course Requirement:</label>
                                    <textarea class="form-control" name="requirement" placeholder="Course Requirement" rows="5" required>{{$course->requirement}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Target Audience:</label>
                                    <textarea class="form-control" name="audience" placeholder="Target Audience" rows="5" required>{{$course->audience}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Benefit from the course:</label>
                                    <textarea class="form-control" name="benefit" placeholder="Benefit from the course" rows="5" required>{{$course->benefit}}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="tag">Course Tags:</label>
                                    <select name="tag[]" id="tag" class="js-example-basic-multiple col-md-5" multiple="multiple">
                                        @foreach($tags as $tag)
                                            <option value="{{$tag->id}}">{{$tag->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <label for="basic-url">Course image:</label>
                                <div class="input-group">
                                    <input type="file" name="image" value="{{$course->image}}">
                                </div>

                                <label for="basic-url">Course Demo ID</label>
                                <div class="input-group">
                                    <span class="input-group-addon" id="basic-addon3">https://www.youtube.com/embed/</span>
                                    <input type="text" name="demo" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                                </div>
                                <br/>

                                <br/>
                                <div class="form-group col-md-2">
                                    <label>Course length:</label>
                                    <input class="form-control" name="course_length" id="course_length" placeholder="course length" type="text" value="{{$course->length}}" required>
                                </div>

                                <label for="price">Price</label>
                                <div class="input-group col-md-2">
                                    <span class="input-group-addon">$</span>
                                    <input type="text" name="price" id="price" class="form-control" aria-label="Amount (to the nearest dollar)" value="{{$course->price}}">
                                    <span class="input-group-addon">.00</span>
                                </div>

                            </fieldset>
                            <div>
                                <button type="submit" class="btn btn-success"> <i class="fa fa-save"></i> Update</button>
                                <a class="btn btn-small btn-danger" href="/admin/course/">Cancel</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script src="/js/select2.min.js"></script>
    <script type="text/javascript">
        $(".js-example-basic-multiple").select2();
        $(".js-example-basic-multiple").select2().val({!! $selected_tags !!}).trigger('change');
    </script>
@endsection