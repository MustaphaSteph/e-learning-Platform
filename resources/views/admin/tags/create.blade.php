@extends('admin.yield')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-11">
                <div class="content-box-large">
                    <div class="panel-heading">
                        <div class="panel-title">add tags</div>

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
                        <form role="form" method="POST" action="{{url('/admin/tags')}}">
                            {{ csrf_field() }}

                            <fieldset>
                                <div class="form-group">
                                    <label>tag name:</label>
                                    <input class="form-control" name="name" id="name" placeholder="tag name" type="text" required>
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

