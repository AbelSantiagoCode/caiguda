@extends('layouts.app')


@section('title',"Gestió d'usuaris - Afegir Usuari")

@section('content')

	
	<div class="col-md-8 col-md-offset-2">
	@if (count($errors) > 0)
	<div class="alert alert-danger">
		<strong>Error!</strong> Revisar camps obligatoris.<br><br>
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
				<form method="POST" action="{{ route('user.store') }}"  role="form">
					{{ csrf_field() }}

					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="dni" id="dni" class="form-control input-sm" placeholder="DNI">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="name" id="name" class="form-control input-sm" placeholder="Name">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="email" id="email" class="form-control input-sm" placeholder="Email">
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">   
							<div class="form-group">
								<input type="text" name="password" id="password" class="form-control input-sm" placeholder="Password">
							</div>
						</div>
					</div>
					

					<div class="row">
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">

								@can('isRole','superadmin')
									
									<select name='rol' class="form-control">
										<option value="consumer">Consumer</option>
										<option value="admin">Admin</option>
										<option value="superadmin">Superadmin</option>

									</select>

								@elsecan('isRole', 'admin')

									<input type="text" name="rol" id="rol" class="form-control input-sm" value="consumer" readonly>

								@endcan

							</div>
						</div>
					</div>

				

				
					<div class="row">

						<div class="col-xs-6 col-sm-6 col-md-6">
							<input type="submit"  value="Guardar" class="btn btn-info btn-block">
							<a href="{{ route('user.index') }}" class="btn btn-danger btn-block" >Cancel·lar</a>
						</div>	

					</div>
					
				</form>
			</div>
		</div>

	</div>
</div>

@endsection