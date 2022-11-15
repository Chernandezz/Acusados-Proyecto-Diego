@extends('layouts.app')
@section('content')

<div class="container">



<h1>MENU PRINCIPAL ACUSADOS</h1>

@if (Session::has('mensaje'))
  {{Session::get('mensaje')}}
@endif

<a href="{{url('/')}}">Regresar</a>
<a href="{{url('/acusados/create')}}">Crear nuevo Acusado</a>

<table class="table">
  <thead>
    <tr>
      <th scope="col">Cedula</th>
      <th scope="col">Nombre</th>
      <th scope="col">Telefono</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($acusados as $acusado)
      <tr>
        <td>{{$acusado->cedula}}</td>
        <td>{{$acusado->nombre}}</td>
        <td>{{$acusado->telefono}}</td>
        <td>
          <a href="{{url('/acusados/'.$acusado->cedula.'/edit')}}">
            Editar
          </a>
          | Acusaciones | 
          <form action="{{url('/acusados/'.$acusado->cedula)}}" method="POST">
            @csrf
            {{method_field('DELETE')}}
            <input type="submit" onclick="return confirm('¿Desea Borrar?')" value="Borrar">
          </form>

        </td>
      </tr>
    @endforeach
    
  </tbody>
</table>
</div>
@endsection

