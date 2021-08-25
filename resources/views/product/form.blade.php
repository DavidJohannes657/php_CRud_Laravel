@extends('layout')
@section('title',$product->id ? 'Editar Producto' : 'Nuevo Producto')
@section('h1',$product->id ? 'Editar Producto' : 'Editar Producto')

@section('content')
<h1>Formulario</h1>
<form action="{{ route('product.save')}}"method="post">
@csrf
<input type="hidden" name='id' value="{{ $product->id }}">
<div class="mb-3 row">
        <label for="name" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="name" name='name' value="{{
                @old('name') ?  @old('name'): $product->name }}">
        </div>
        @error('name')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mb-3 row">
        <label for="cost" class="col-sm-2 col-form-label">cost</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="cost" name='cost'value="{{
                @old('cost')  ?  @old('cost'): $product->cost }}">
        </div>
        @error('cost')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>
    <div class="mb-3 row">
        <label for="price" class="col-sm-2 col-form-label">Price</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="price" name='price'value="{{
                @old('price') ?  @old('price'): $product->price }}">
        </div>
        @error('price')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mb-3 row">
        <label for="quantity" class="col-sm-2 col-form-label">Quantity</label>
        <div class="col-sm-10">
            <input type="text" class="form-control" id="quantity" name='quantity'value="{{
                @old('quantity') ?  @old('quantity'): $product->quantity }}">
        </div>
        @error('quantity')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>
    <div class="mb-3 row">
        <label for="category" class="col-sm-2 col-form-label">Categories</label>
        <div class="col-sm-10">
            <select name="category" class="form-select">
            @foreach ($categories as  $category)
            <option value="{{$category->id}}">{{$category->name}}</option>

            @endforeach
        </select>
        </div>
        @error('category')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>
    <div class="mb-3 row">
        <label for="brand" class="col-sm-2 col-form-label">Brand</label>
        <div class="col-sm-10">
            <select name="brand" class="form-select">
            @foreach ($brands as  $brand)
            <option value="{{$brand->id}}">{{$brand->name}}</option>

            @endforeach
        </select>
        </div>
        @error('brand')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror
    </div>

    <div class="mb-3 row">
        <div class="col-sm-11"></div>
        <div class="col-sm-1">
            <button type="submit" class="btn btn-primary">Guardar</button>

        </div>


    </div>
    <input type="button" onclick="history.back()" name="volver atrás" value="volver atrás">

</form>
@endsection

