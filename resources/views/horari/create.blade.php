@extends('layouts.app')


@section('title',"Gestió Horari - Afegir Franja horaria")

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
				<form method="POST" action="{{ route('horari.store') }}"  role="form">
					{{ csrf_field() }}

					<div class="row">
						<div class="col-xs-2 col-xs-2 col-sm-2">
							<label>Dia</label>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">

							<select name="day" id="day" class="form-control input-sm">
								<option value="dilluns">dilluns</option>
								<option value="dimarts">dimarts</option>
								<option value="dimecres">dimecres</option>
								<option value="dijous">dijous</option>
								<option value="divendres">divendres</option>
								<option value="dissabte">dissabte</option>
								<option value="diumenge">diumenge</option>
								
							</select>
							</div>
						</div>
					</div>

					
					<div class="row">
						<div class="col-xs-2 col-xs-2 col-sm-2">
							<label>Inici</label>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
							<input type="time" class="form-control input-sm" id="start" name="start" min="0:00" max="24:00" required>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-xs-2 col-xs-2 col-sm-2">
							<label>Final</label>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
							<input type="time" class="form-control input-sm" id="finish" name="finish" min="0:00" max="24:00" required>
							</div>
						</div>
					</div>
					


		

					<br>
				
					<div class="row">
						<div class="col-xs-2 col-xs-2 col-sm-2">
							<label></label>
						</div>

						<div class="col-xs-6 col-sm-6 col-md-6">
							<input type="submit"  value="Guardar" class="btn btn-info btn-block">
							<a href="{{ route('horari.index') }}" class="btn btn-danger btn-block" >Cancel·lar</a>
						</div>	

					</div>
					
				</form>
			</div>
		</div>

	</div>
</div>

@endsection