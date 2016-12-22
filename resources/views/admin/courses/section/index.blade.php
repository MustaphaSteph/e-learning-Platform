@extends('admin.yield')

@section('content')



    <div class="col-md-10">

        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Sections</div>
            </div>
            <div class="panel-body">

                @if (session('message'))

                    <div class="alert alert-success alert-dismissible fade in" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <strong>Success : </strong> {{ session('message') }}.
                    </div>

                @endif

                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                    <thead>
                    <tr>
                        <th>id</th>
                        <th>title</th>
                        <th>length</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($sections as $section)
                        <tr class="odd gradeX">
                            <td>{{$section->id}}</td>
                            <td>{{$section->title}}</td>
                            <td>{{$section->length}}</td>
                            <td>
                                <a class="btn btn-small btn-default" href="/admin/course/section/{{$section->id}}/add_lecture">Add Lecture</a>
                                <a class="btn btn-small btn-success" href="/admin/course/section/{{$section->id}}/show_lectures">Show Lectures</a>
                            </td>
                            <td>
                                <form action="{{ url('/admin/course/section/'.$section->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" id="delete-task-{{ $section->id }}" class="btn btn-small btn-danger" onclick="return confirm('Are you sure you want to delete this section?');">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                    <a class="btn btn-small btn-warning" href="/admin/course/section/{{$section->id}}/edit">
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

@endsection