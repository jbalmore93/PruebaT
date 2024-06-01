@extends('layouts.app')
@section('titulo','Home')
@section('contenido')
<button class="btn btn-outline-primary btn-sm mb-2" type="button" class="btn btn-primary"
data-bs-toggle="modal" data-bs-target="#exampleModal">Nuevo</button>
<div class="form-group mb-2">
    <input type="text" id="buscar" class="form-control" placeholder="Buscar Por Nombre">
</div>
@include('Sistema.Productos.crear')
<table id="tabla" class="table table-success">
<thead>
<tr class="text-center">
<th>ID</th>
<th>NOMBRE</th>
<th>DESCRIPCION</th>
<th>PRECIO</th>
<th>CATEGORIA</th>
<th colspan="2">ACCIONES</th>
</tr>
</thead>
<tbody>
@foreach($productos as $prod)
<tr class="text-center">
<td>{{$prod->id_pro}}</td>
<td>{{$prod->nombre_pro}}</td>
<td>{{$prod->descripcion_pro}}</td>
<td>${{$prod->precio_pro}}</td>
<td>{{$prod->cat_id}}</td>
<td>
    <button class="btn btn-info btn-sm editar" type="button"
    data-bs-toggle="modal" data-bs-target="#editarModal" data-id="{{ $prod->id_pro }}">Editar</button>
    @if($editar)
    @include('Sistema.Productos.editar')
    @endif
    </td><td>
    <form id="form-delete-{{$prod->id_pro}}" action="{{ route('producto.destroy', $prod->id_pro) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="button" class="btn btn-danger btn-sm eliminar" data-id="{{$prod->id_pro}}">Eliminar</button>
    </form>
</td>
</tr>
@endforeach
</tbody>
</table>
@endsection
