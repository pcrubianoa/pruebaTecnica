@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Papeleria área administrativa</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <a class="btn btn-primary" href="{{ route('orders.create') }}">Nuevo pedido</a>
                    <a class="btn btn-success" href="{{ route('orders.index') }}">Estado pedidos</a>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
