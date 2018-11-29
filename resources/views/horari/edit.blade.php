@extends('layouts.app')

@section('title',"Gestió d'Horaris - Editar Franja horaria")

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
				<form method="POST" action="{{ route('horari.update',$horari->id) }}"  role="form">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					
					<!-- <input name="_method" type="hidden" value="PATCH"> -->


					<div class="row">
						<div class="col-xs-2 col-xs-2 col-sm-2">
							<label>Dia</label>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">

							<select name="day" id="day" class="form-control input-sm">
								@php
								$dies = array('dilluns', 'dimarts', 'dimecres', 'dijous', 'divendres', 'dissabte', 'diumenge');

								@endphp

								@foreach($dies as $dia)
									@if($horari->day == $dia)
										<option value="{{$dia}}" selected="selected">{{$dia}}</option>
									@else
									<option value="{{$dia}}">{{$dia}}</option>
									@endif
								@endforeach
								
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
							<input type="time"  class="form-control input-sm" id="start" name="start" min="0:00" max="24:00" value="{{$horari->start}}" required>
							</div>
						</div>
					</div>


					<div class="row">
						<div class="col-xs-2 col-xs-2 col-sm-2">
							<label>Final</label>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
							<input type="time" class="form-control input-sm" id="finish" name="finish" min="0:00" max="24:00" value="{{$horari->finish}}" required>
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
							<a href="{{ route('horari.index') }}" class="btn btn-danger btn-block" >Cancel·la</a>
						</div>	

					</div>
				</form>
			</div>
		</div>

	</div>
</div>





@endsection