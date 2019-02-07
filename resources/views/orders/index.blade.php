@extends('orders.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <h1 class="mt-5 mb-5">Estado de pedidos</h1>
                    <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('main') }}"> Regresar</a>
        </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre</th>
            <th>Fecha Registro</th>
            <th>Concepto</th>
            <th>Articulo</th>
            <th>Fecha completado</th>
            <th>Estado</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($orders as $order)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $order->user->name }}</td>
            <td>{{ $order->created_at }}</td>
            <td>{{ $order->concept }}</td>
            <td>{{ $order->article->name }}</td>
            <td>{{ $order->updated_at }}</td>
            <td>@if($order->state)
                <span class="badge badge-danger">Completado</span>
                @else
                <span class="badge badge-success">Activo</span>
                @endif
            </td>
            <td>
                <form action="{{ route('orders.destroy',$order->id) }}" method="POST">
   
    
                    <a class="btn btn-primary btn-sm" href="{{ route('orders.edit', $order->id) }}">Completado</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $orders->links() !!}
      
@endsection