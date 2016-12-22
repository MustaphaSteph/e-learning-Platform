@extends('admin.yield')



@section('content')

    <div class="col-md-10">

        <div class="content-box-large">
            <div class="panel-heading">
                <div class="panel-title">Users</div>
            </div>


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
             <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
            <thead>
            <tr>
                <th>id</th>
                <th>name</th>
                <th>email</th>
                <th class="col-xs-4">Role</th>


            </tr>
            </thead>
            <tbody>
           @foreach($users as $user)
               @if($user->name!="admin")
            <tr class="odd gradeX">
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    <form role="form" method="POST" action="/admin/users/{{$user->id}}/roles">
                        {{ csrf_field() }}
                        <input name="_method" type="hidden" value="PUT">
                        <div class="form-group col-xs-4">
                        <select class="form-control" id="role" name="role">
                            @if($user->role->name=="student")
                            <option value="student" selected>student</option>
                            <option value="teacher">teacher</option>
                            @else
                            <option value="teacher" selected>teacher</option>
                            <option value="student">student</option>
                            @endif
                        </select>
                    </div>
                        <button type="submit" class="btn btn-info" >update role</button>
                    </form>
                    </td>
                <td>
                    <button class="btn btn-danger">Delete</button>
                </td>

            </tr>
            @endif
            @endforeach

            </tbody>
        </table>

    </div>
        </div>
    </div>

@endsection