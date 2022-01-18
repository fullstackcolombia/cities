@extends('layout')
@section('content')
<h3>Ejemplo fichero cities.txt</h3>
<a href="{{url('create')}}" class="btn btn-primary">Agregar ciudades</a>
<a href="javascript:void(0)" data-href="{{url('download')}}" class="btn btn-info btn_lista">Descargar ciudades</a>
@endsection