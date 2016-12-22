@extends('admin.yield')

@section('content')

    <div class="col-md-10">

        <div class="content-box-large">
            <div class="panel-heading">

                <div class="panel-title">
                    <h2>
                        Tags
                    </h2>
                    <br/>

                    <a class="btn btn-small btn-info" href="/admin/tags/create">
                        <i class="fa fa-btn fa-pencil"></i> Add new tag
                    </a>
                </div>

            </div>
            <br/>

            <div class="panel-body">

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

                        <br>
                    <div class="row">
                        <div class="col-sm-3 pull-left">
                            <table class="table table-striped table-bordered" id="example">
                                <thead>
                                <tr>
                                    <th>name</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tags as $tag)
                                    <tr class="odd gradeX">
                                        <td class="col-md-2">{{$tag->name}}</td>
                                        <td class="col-md-8">
                                            <form action="{{ url('/admin/tags/'.$tag->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" id="delete-task-{{ $tag->id }}" class="btn btn-small btn-danger" onclick="return confirm('Are you sure you want to delete this tag?');">
                                                    <i class="fa fa-btn fa-trash"></i>Delete
                                                </button>
                                                <button type="button" class="btn btn-warning btn-small" data-toggle="modal" data-target="#myModal"
                                                        data-whatever="/admin/tags/{{$tag->id}}" data-name="{{$tag->name}}">
                                                    <i class="fa fa-btn fa-pencil"></i> Edit
                                                </button>
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

        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">edit Tag</h4>
                    </div>
                    <div class="modal-body">
                        <form role="form" method="POST" >
                         {{ csrf_field() }}
                         <input name="_method" type="hidden" value="PUT">
                        <div class="form-group">
                            <label for="tag-name" class="form-control-label">name:</label>
                            <input type="text" name="tag-name" class="form-control" id="tag-name" >
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

    </div>

@endsection

@section('script')
    <script type="text/javascript">
    $('#myModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget); // Button that triggered the modal
    var link = button.data('whatever'); // Extract info from data-* attributes
    var name = button.data('name');
    // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
    // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
    var modal = $(this);
    modal.find('.modal-body form').attr('action',link);
        $('#tag-name').val(name);

    });
    </script>
    @endsection