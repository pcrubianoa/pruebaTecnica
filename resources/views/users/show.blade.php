@extends('users.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <br>   
                <h2> Ver Usuario</h2>
            </div>
            <br>  
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> <RP></RP>Regresar</a>
            </div>
        </div>
    </div>
     <br>
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nombre:</strong>
                {{ $user->name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>codigo:</strong>
                {{ $user->code }}
            </div>
        </div>
    </div>
@endsection