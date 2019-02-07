@extends('articles.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>   
                <h2> Ver Articulo</h2>
            </div>
            <br>  
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('orders.index') }}"> <RP></RP>Regresar</a>
            </div>
        </div>
    </div>
     <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $order->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>codigo:</strong>
                {{ $order->code }}
            </div>
        </div>
    </div>
@endsection