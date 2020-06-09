@extends('admin.layouts.app')

@section('title', 'Cadastrar novo Produto')

@section('content')
<h1>Editar produto {{$product->id}}</h1>
    
    <form action="{{route('products.update', $product->id)}}" method="POST" enctype="multipart/form-data">
        @method('PUT')
        <input type="hidden" name="id" value="{{$product->id}}">
        @include('admin.pages.products._partials.form')
    </form>
@endsection