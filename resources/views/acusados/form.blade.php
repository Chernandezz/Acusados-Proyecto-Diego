@extends('layouts.app')

@if(count($errors)>0)
<div class="alert alert-danger" role="alert">
  <ul>
    @foreach ($errors->all() as $error)
    <li>{{$error}}</li>
    @endforeach 
  </ul>
</div>

@endif

<div class="container">

  <h1>{{$modo}} acusado</h1>
  
  <label for="cedula">Cedula</label>
  @if (isset($isEdit))
  <input type="text" name="cedula" value="{{isset($acusado->cedula)?$acusado->cedula:old('cedula')}}" id="cedula" disabled>
  <br/>
  @else
  <input type="text" name="cedula" value="{{isset($acusado->cedula)?$acusado->cedula:old('cedula')}}" id="cedula">
  <br/>
  @endif
  <label for="nombre">Nombre</label>
  <input type="text" name="nombre" value="{{isset($acusado->nombre)?$acusado->nombre:old('nombre')}}" id="nombre">
  <br/>
  <label for="telefono">Telefono</label>
  <input type="text" name="telefono" value="{{isset($acusado->telefono)?$acusado->telefono:old('telefono')}}" id="telefono">
  <br/>
  <input type="submit" value="{{$modo}} Datos">
  <a href="{{url('acusados')}}">Regresar</a>
  <br/>

</div>