@extends('articles.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
            </div>
            <br>
            <br>
            <br>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('articles.create') }}"> Nuevo articulo</a>
            </div>
            <br>
            <br>
            <br>
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
            <th>Código</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($articles as $article)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $article->name }}</td>
            <td>{{ $article->code }}</td>
            <td>
                <form action="{{ route('articles.destroy',$article->id) }}" method="POST">
   
                    <a class="btn btn-success" href="{{ route('articles.show',$article->id) }}">Ver</a>
    
                    <a class="btn btn-primary" href="{{ route('articles.edit',$article->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $articles->links() !!}
      
@endsection