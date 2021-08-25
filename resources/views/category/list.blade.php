@extends('layout')
@section('title','Lista De Categorias')
@section('h1','Lista De Categorias')
@section('content')
<a href="{{route('category.form')}}" class="btn btn-primary" style=float:right;>Nuevo Marca</a>
@if(Session::has('message'))
    <p class="text-danger">{{ Session::get('message') }}</p>
@endif
@if(Session::has('successMessage'))
    <p class="text-success">{{ Session::get('successMessage') }}</p>
@endif
<table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>Name</th>
            <th>Descripcion</th>
</tr>

</thead>
<tbody>
    @foreach($list as $category)
    <tr>
        <td>{{ $category->name }}</td>
        <td>{{ $category->description }}</td>

        <td>
            <a href = "{{ route('category.form',['id'=>$category->id])}}" class="btn btn-warning">Editar</a>
            <a href = "{{ route('category.delete',['id'=>$category->id])}}" class="btn btn-danger">Borrar</a>

        </td>
</tr>
@endforeach

</tbody>
</table>
@endsection
