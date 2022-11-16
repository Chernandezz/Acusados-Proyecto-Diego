@extends('layouts.app')
@section('content')

<div class="container">



<h1>Juzgar Acusado</h1>
<br>

<h2>VEREDICTO</h2>
<br>

<p>La persona acusada {{$acusado->nombre}} identificada con cedula de ciudadania {{$acusado->cedula}}, fue juzgado en {{$totalAcusaciones}} ocasiones, de las cuales fue encontrado culpable en {{$acusacionesCulpable}}, e inocente en {{$acusacionesInocente}}, por tal motivo {{$acusado->nombre}}, es:</p>
<br>

@if ($esCulpable)
  <h1>CULPABLE</h1>
@else
  <h1>INOCENTE</h1>
@endif



<a href="{{url('/acusados')}}">Ir al Inicio</a>

</div>
@endsection