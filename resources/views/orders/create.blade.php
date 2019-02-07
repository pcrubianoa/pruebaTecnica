@extends('orders.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <br>
            <h2 class="mb-5">Crear nuevo pedido</h2>
        </div>
        <br>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('main') }}"> Regresar</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('orders.store') }}" method="POST">
    @csrf
<h5>Datos de usuario:</h5>
   <hr>
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Usuario:</strong>
            <select class="form-control" name="user" id="exampleFormControlSelect1">
            @foreach($users as $user)
                <option value="{{ $user->id }}">{{ $user->name }}</option>
            @endforeach
            </select>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha:</strong>
                <input type="date" name="date" class="form-control" placeholder="codigo">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Concepto:</strong>
                <input type="text" name="concept" class="form-control" placeholder="Concepto">
            </div>
        </div>

    </div>
      <h5 class="mt-5">Detalles de pedido:</h5>
        <hr>
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
          <div class="form-group">
            <strong>Articulo:</strong>
            <select class="form-control" name="article" id="exampleFormControlSelect1">
            @foreach($articles as $article)
                <option value="{{ $user->id }}">{{ $article->name }}</option>
            @endforeach
            </select>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cantidad:</strong>
                <input type="text" name="quantity" class="form-control" placeholder="Cantidad">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-check">
              <label class="form-check-label">
                <input name="import" type="checkbox" class="form-check-input" value="0">Importado
              </label>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-check">
              <label class="form-check-label">
                <input name="state" type="checkbox" class="form-check-input" value="0">Estado
              </label>
            </div>
        </div>

    </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
</form>


@endsection