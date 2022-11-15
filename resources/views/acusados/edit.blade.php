@extends('layouts.app')


@section('content')
<div class="container">

  Editar acusado
  
  <form action="{{url('/acusados/'.$acusado->cedula)}}" method="post">
    @csrf
    {{method_field('PATCH')}}
    @include('acusados.form',['modo'=>'Editar'])
  </form>
  
</div>
@endsection