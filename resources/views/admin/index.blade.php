@extends('admin.yield')

@section('content')

		  <div class="col-md-10">

			  <div class="row">
				  <div class="col-lg-3 col-md-6">
					  <div class="panel panel-primary">
						  <div class="panel-heading">
							  <div class="row">
								  <div class="col-xs-3">
									  <i class="fa fa-user fa-5x"></i>
								  </div>
								  <div class="col-xs-9 text-right">
									  <div class="huge">{{$users}}</div>
									  <div>Users</div>
								  </div>
							  </div>
						  </div>
					  </div>
				  </div>
				  <div class="col-lg-3 col-md-6">
					  <div class="panel panel-yellow">
						  <div class="panel-heading">
							  <div class="row">
								  <div class="col-xs-3">
									  <i class="fa fa-video-camera fa-5x"></i>
								  </div>
								  <div class="col-xs-9 text-right">
									  <div class="huge">{{$courses}}</div>
									  <div>Courses</div>
								  </div>
							  </div>
						  </div>
					  </div>
				  </div>
				  <div class="col-lg-3 col-md-6">
					  <div class="panel panel-green">
						  <div class="panel-heading">
							  <div class="row">
								  <div class="col-xs-3">
									  <i class="fa fa-shopping-cart fa-5x"></i>
								  </div>
								  <div class="col-xs-9 text-right">
									  <div class="huge">2</div>
									  <div>Subscriptions</div>
								  </div>
							  </div>
						  </div>
					  </div>
				  </div>
				  <div class="col-lg-3 col-md-6">
					  <div class="panel panel-red">
						  <div class="panel-heading">
							  <div class="row">
								  <div class="col-xs-3">
									  <i class="fa fa-envelope fa-5x"></i>
								  </div>
								  <div class="col-xs-9 text-right">
									  <div class="huge">0</div>
									  <div>Message</div>
								  </div>
							  </div>
						  </div>
					  </div>
				  </div>
			  </div>

		  	<div class="row">
		  		<div class="col-md-6">

		  			<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Send notification</div>
							
							<div class="panel-options">
								<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
								<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
							</div>
						</div>
		  				<div class="panel-body">
								<form action="">
									<fieldset>
										<div class="form-group">
											<label>Notification</label>
											<input class="form-control" name="notification" placeholder="Notification..." type="text">
										</div>
									</fieldset>
									<div>
										<div class="btn btn-primary">
											<i class="fa fa-save"></i>
											Submit
										</div>
									</div>
								</form>
							</div>
		  			</div>
		  		</div>

		  		<div class="col-md-6">
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Last courses</div>
								
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
								<ul class="list-group">
								@foreach($last_courses as $course)
									<li class="list-group-item">Course :{{$course->title}} </li>
								@endforeach
								</ul>
							</div>
		  				</div>
		  			</div>
		  			<div class="row">
		  				<div class="col-md-12">
		  					<div class="content-box-header">
			  					<div class="panel-title">Last users</div>
								
								<div class="panel-options">
									<a href="#" data-rel="collapse"><i class="glyphicon glyphicon-refresh"></i></a>
									<a href="#" data-rel="reload"><i class="glyphicon glyphicon-cog"></i></a>
								</div>
				  			</div>
				  			<div class="content-box-large box-with-header">
								<ul class="list-group">
								@foreach($last_users as $user)
										<li class="list-group-item">Email :{{$user->email}} , Username: {{$user->name}}</li>
									@endforeach
								</ul>


							</div>
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		  </div>

@endsection