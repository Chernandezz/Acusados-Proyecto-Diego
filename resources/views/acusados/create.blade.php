@extends('layouts.app')
@section('content')
<div class="container">

  
  Crear acusado
  
  <form action="{{url('/acusados')}}" method="post">
    @csrf
    @include('acusados.form',['modo'=>'Crear'])
  </form>
  
</div>
@endsection