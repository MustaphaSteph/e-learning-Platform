@extends('admin.yield')

@section('content')

    <div class="col-md-10">

        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2>
                        Blog posts
                    </h2>
                        <br/>

                    <a class="btn btn-small btn-info" href="/admin/blog/create">
                        <i class="fa fa-btn fa-pencil"></i> Add Post
                    </a>
                </div>
            </div>
            <br/>


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
                <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
                    <thead>
                    <tr>
                        <th class="col-md-1">id</th>
                        <th class="col-md-4">title</th>
                        <th class="col-md-1">image</th>
                        <th class="col-md-1">time to read</th>
                        <th class="col-md-2">created_at</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $post)
                        <tr class="odd gradeX">
                            <td>{{$post->unique_id}}</td>
                            <td>{{$post->title}}</td>
                            <td>{{$post->picture}}</td>
                            <td>{{$post->time_to_read}}</td>
                            <td>{{$post->created_at}}</td>

                            <td class="col-md-2">
                                <form action="{{ url('/admin/blog/'.$post->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <button type="submit" class="btn btn-small btn-danger" onclick="return confirm('Are you sure you want to delete this post?');">
                                        <i class="fa fa-btn fa-trash"></i>Delete
                                    </button>
                                    <a class="btn btn-small btn-warning" href="/admin/blog/{{$post->id}}/edit">
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