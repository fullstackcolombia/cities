@extends('layout')
@section('content')
<form action="{{url('add')}}" method="post" enctype="multipart/form-data">
	{{csrf_field()}}
	<div class="row g-3">
		<div class="col-4 mb-3">
			<label for="archivo" class="form-label">Archivo</label>
			<input name="archivo" type="file" class="form-control" id="archivo">
		</div>
	</div>
	<button type="submit" class="btn btn-primary">Enviar</button>
	<a href="{{url('/')}}" class="btn btn-dark">Cancelar</a>
</form>
@endsection