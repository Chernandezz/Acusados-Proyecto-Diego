@extends('layouts.app')
@section('content')
<div class="container">

  
  Crear Acusacion
  
  <form action="{{url('/acusaciones')}}" method="post">
    @csrf
    @include('acusaciones.form',['modo'=>'Crear'])
  </form>
  
</div>
@endsection