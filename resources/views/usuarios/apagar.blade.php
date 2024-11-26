{{-- views/usuarios/apagar.blade.php --}}

@extends('base')

@section('titulo', 'Apagar | Usuário')

@section('conteudo')
    <p>Tem certeza que quer apagar?</p>

    <p><em>{{ $usuario['nome'] }}</em></p>

    <form action="{{ route('usuarios.apagar', $usuario['id']) }}" method="post">
        @method('delete')
        @csrf
        
        <input type="submit" value="Pode apagar sem medo" style="background:red; color:white;">
    </form>

    <a href="{{ route('usuarios') }}">Cancelar</a>
@endsection