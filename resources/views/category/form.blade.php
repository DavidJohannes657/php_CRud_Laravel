@extends('layout')
@section('title',$category->id ? 'Editar Categoria' : 'Nueva Categoria')
@section('h1',$category->id ? 'Editar Categoria' : 'Nueva Categoria')

@section('content')
<h1>Formulario</h1>
<form action="{{ route('category.save')}}"method="post">
@csrf
<input type="hidden" name='id' value="{{ $category->id }}">
<div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name='name' value="{{
                @old('name') ?  @old('name'): $category->name }}">
        </div>
        @error('name')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mb-3 row">
        <label for="description" class="col-sm-2 col-form-label">Description</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="description" name='description'value="{{
                @old('description') ?  @old('description'): $category->description }}">
        </div>
        @error('description')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>


    <div class="mb-3 row">
        <div class="col-sm-11"></div>
        <div class="col-sm-1">
            <a href=""></a>
            <button type="submit" class="btn btn-primary">Guardar</button>

        </div>


    </div>
    <input type="button" onclick="history.back()" name="volver atrás" value="volver atrás">

</form>
@endsection

