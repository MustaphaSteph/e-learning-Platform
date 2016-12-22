@extends('admin.yield')

@section('content')

    <div class="col-md-10">

        <div class="content-box-large">

            <div class="panel-heading">
                <div class="panel-title">
                    <h2>
                        Manage your courses
                    </h2>
                    <br/>

                    <a class="btn btn-small btn-info" href="/admin/course/create">
                        <i class="fa fa-btn fa-pencil"></i> Add new course
                    </a>
                </div>
            </div>
            <br/>

            <div class="panel-body">

                @if (session('message'))

                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Success : </strong> {{ session('message') }}.
                    </div>

                @endif
                <div class="row">
                    <div class="col-md-10 pull-left">
                        <table class="table table-hover table-bordered">
                            <thead>
                            <tr>
                                <th>id</th>
                                <th>title</th>
                                <th>length</th>
                                <th>Sections</th>
                                <th>Students</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($courses as $course)
                                <tr class="odd gradeX">
                                    <td>{{$course->id}}</td>
                                    <td>{{$course->title}}</td>
                                    <td>{{$course->length}}</td>
                                    <td>{{$course->section()->count()}}</td>
                                    <td>{{$course->users()->count()}} <a class="btn btn-small btn-warning" href="/teacher/course/{{$course->id}}/users/list">
                                            <i class="fa fa-btn fa-pencil"></i> Show lists
                                        </a></td>
                                    <td>
                                        <a class="btn btn-small btn-default" href="/admin/course/{{$course->id}}/add_section">Add section</a>
                                        <a class="btn btn-small btn-success" href="/admin/course/{{$course->id}}/show_sections">Show sections</a>
                                    </td>
                                    <td>
                                        <form action="{{ url('/admin/course/'.$course->id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" id="delete-task-{{ $course->id }}" class="btn btn-small btn-danger" onclick="return confirm('Are you sure you want to delete this Course?');">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                            <a class="btn btn-small btn-warning" href="/admin/course/{{$course->id}}/edit">
                                                <i class="fa fa-btn fa-pencil"></i> Edit
                                            </a>
                                        </form>

                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection