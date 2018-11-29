@extends('layouts.app')

@section('title',"Gestió de Sectors - Editar Sector")

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
				<form method="POST" action="{{ route('sector.update',$sector->id) }}"  role="form">
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					
					<input name="_method" type="hidden" value="PATCH">


						<div class="row">
						<div class="col-xs-2 col-xs-2 col-sm-2">
							<label>Identificador</label>
						</div>
						<div class="col-xs-6 col-sm-6 col-md-6">
							<div class="form-group">
								<input type="text" name="id" id="id" class="form-control input-sm" value="{{$sector->id}}">
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
							<a href="{{ route('sector.index') }}" class="btn btn-danger btn-block" >Cancel·la</a>
						</div>	

					</div>
				</form>
			</div>
		</div>

	</div>
</div>





@endsection