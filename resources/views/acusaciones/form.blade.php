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

  <h1>{{$modo}} acusaciones</h1>
  
  <label for="cedula">Cedula Acusado</label>
  <input type="text" name="cedula" value="{{$acusado->cedula}}" readonly={{$acusado->cedula}}id="cedula" disabled>
  <br/>
  <label for="descripcion">Descripcion</label>
  <textarea name="descripcion" rows="3" cols="30" placeholder="Escriba una descripción" value="{{old('descripcion')}}"></textarea>
  <br/>
  <label for="culpable">culpable</label>
  <div>
      <input type="radio" id="culpable" name="culpable" value="1"
             checked>
      <label for="culpable">Verdadero</label>
    </div>

    <div>
      <input type="radio" id="culpable" name="culpable" value="0">
      <label for="culpable">Falso</label>
    </div>
  </div>
  <br/>
  <input type="submit" value="{{$modo}} Datos">
  <a href="{{url('acusaciones/'.$acusado->cedula)}}">Regresar</a>
  <br/>

</div>