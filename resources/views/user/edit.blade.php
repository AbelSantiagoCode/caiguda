@extends('layouts.app')

@section('title',"Gestió d'usuaris - Editar Usuari")

@section('content')



<div class="col-md-8 col-md-offset-2">
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Error!</strong> Reviar camps obligatoris.<br><br>
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif
	@if(Session::has('success'))
	<div class="alert alert-info">
		{{Session::get('success')}}
	</div>
	@endif

	<div class="panel panel-default">
		<div class="panel-body">					
			<div class="table-container">
				<form method="POST" action="{{ route('user.update', $user->dni) }}"  role="form">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					


						<div class="row">
							<div class="col-xs-2 col-xs-2 col-sm-2">
								<label>DNI</label>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">

								<div class="form-group">
									<input type="text" name="dni" id="dni" class="form-control input-sm" value="{{$user->dni}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-2 col-xs-2 col-sm-2">
								<label>Name</label>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="name" id="name" class="form-control input-sm" value="{{$user->name}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-2 col-xs-2 col-sm-2">
								<label>Email</label>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="email" id="email" class="form-control input-sm" value="{{$user->email}}">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xs-2 col-xs-2 col-sm-2">
								<label>Password</label>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">
									<input type="text" name="password" id="password" class="form-control input-sm" value="{{$user->password}}">
								</div>
							</div>
						</div>



						<div class="row">
							<div class="col-xs-2 col-xs-2 col-sm-2">
								<label>Rol</label>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6">
								<div class="form-group">

									
										@can('isRole','superadmin')
											<select name='rol' class="form-control">

											@foreach($roles as $rol)
												
												@if ($role == $rol->name)
													<option value="{{$rol->name}}" selected="selected">{{$rol->name}}</option>
													
												@else
													<option value="{{$rol->name}}">{{$rol->name}}</option>

												@endif
											@endforeach
											</select> 	
											
										@elsecan('isRole', 'admin')

											<input type="text" name="rol" id="rol" class="form-control input-sm" value="consumer" readonly>

										@endcan
								
										
											
								</div>
							</div>
						</div>

					
					
					<br>
					<div class="row">
						<div class="col-xs-2 col-xs-2 col-sm-2">
							<label></label>
						</div>

						<div class="col-xs-6 col-sm-6 col-md-6"> 
						  
							<input type="submit"  value="Actualitzar" class="btn btn-info btn-block">
							<a href="{{ route('user.index') }}" class="btn btn-danger btn-block" >Cancel·la</a>
						
						</div>	
				
					</div>
				</form>
			</div>
		</div>

	</div>
</div>





@endsection