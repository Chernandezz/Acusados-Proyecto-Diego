@extends('layouts.app')
@section('content')

<div class="container">



<h1>MENU PRINCIPAL ACUSACIONES</h1>

@if (Session::has('mensaje'))
  {{Session::get('mensaje')}}
@endif

<a href="{{url('/acusados')}}">Regresar</a>
<a href="{{url('/acusaciones/'.$acusado.'/create')}}">Crear nueva acusacion</a>
<div class="div" style="overflow-x:auto;">
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Cedula Acusado</th>
      <th scope="col">Descripcion</th>
      <th scope="col">Culpable</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($acusaciones as $acusacion)
      <tr>
        <td>{{$acusacion->id}}</td>
        <td>{{$acusacion->cedulaAcusado}}</td>
        <td>{{$acusacion->Descripcion}}</td>
        @if ($acusacion->Culpable)
          <td>Verdadero</td>
        @else
          <td>Falso</td>
        @endif
        
        {{-- <td>
          <a href="{{url('/acusados/'.$acusado->cedula.'/edit')}}">
            Editar
          </a>
          | <a href="{{url('/acusaciones')}}"></a> | 
          <form action="{{url('/acusados/'.$acusado->cedula)}}" method="POST">
            @csrf
            {{method_field('DELETE')}}
            <input type="submit" onclick="return confirm('¿Desea Borrar?')" value="Borrar">
          </form>

        </td> --}}
      </tr>
    @endforeach
    
  </tbody>
</table>
</div>
<a href="{{url('/acusaciones/juzgar/'.$acusado)}}">Juzgar Acusado</a>
</div>
@endsection

