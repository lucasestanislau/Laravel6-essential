@extends('admin.layouts.app')

@section('title', 'Cadastrar novo Produto')

@section('content')
<h1>Cadastrar Novo produto</h1>

    
    <form class="form" action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
        
        @include('admin.pages.products._partials.form')
    </form>
@endsection