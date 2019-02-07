@extends('articles.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>
                <h2>Editar Pedido</h2>
            </div>
            <br>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('articles.index') }}"> Regresar</a>
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
  
    <form action="{{ route('orders.update',$order->id) }}" method="POST">
        @csrf
        @method('PUT')
   

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-check">
              <label class="form-check-label">
                <input name="state" type="checkbox" class="form-check-input" value="{{ $order->state }}">Estado
              </label>
            </div>
        </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>
   
    </form>
@endsection