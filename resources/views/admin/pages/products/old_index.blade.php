@extends('admin.layouts.app')

@section('title', 'index')



@section('content')

@include('admin.includes.alert', ['contentAlert' => 'Exibindo produtos alert'])

@component('admin.components.card')

<a href="{{ route('products.create')}}">Cadastrar Produto</a>
@slot('title')

title card oi
    
@endslot

BOdy do card oi
    
@endcomponent
<hr>

<h1>Exibindo produtos</h1>

@if (isset($products))
    @foreach ($products as $product)
      <p class="@if($loop->last) last @endif">{{$product}}</p>  
    @endforeach
    
@endif
<hr>

@forelse ($products as $product)
{{$product}}
@empty
    Não há produtos cadastrados
@endforelse

<hr>
<hr>
{{$data}}

@if ($data === 123)
    É igual
    
    @else
    
    É Diferente
@endif

@unless ($data === '123')
    Se for falso ele entra aqui

    @else 
    asdasd
@endunless

@isset($data2)

<p>{{$data2}}</p>
    
@endisset

@empty($data2)
    está vazio...
@endempty

@auth
    user autenticado

    @else
    user não autenticado
@endauth

@guest
    Convidado sim
@endguest

@switch($data)
    @case(1)
        caso 1
        @break
    @case(2)
        caso 2
        @break
    @case(123)
        caso 123
        @break
    @default
        default value
@endswitch

@endsection

@push('styles')
<style>
    .last {background: #CCC}
</style>
    
@endpush

@push('scripts')
    <script>
        document.body.style.background = "#EEE";
    </script>
@endpush