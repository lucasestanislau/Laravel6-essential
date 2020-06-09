@extends('admin.layouts.app')

@section('title', "Produto {$product->name}")

@section('content')

<h1>Detalhes do produto {{$product->name}} <a href="{{route('products.index')}}"><<<<</a></h1>

    <ul>
        <li>{{$product->name}}</li>
        <li>{{$product->description}}</li>
        <li>{{$product->price}}</li>
    </ul>

<form action="{{route('products.destroy', $product->id)}}" method="POST">
    @csrf
    @method('DELETE')
<button type="submit" class="btn btn-danger"> Deletar produto {{$product->name}}</button>
</form>

@endsection