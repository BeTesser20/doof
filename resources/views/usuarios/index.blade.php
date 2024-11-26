{{-- resources/views/usuarios/index.blade.php --}}

@extends('base')

@section('titulo', 'Usuários')

@section('conteudo')
    <p>
        <a href="{{ route('usuarios.cadastrar') }}" class="px-4 py-2 text-white font-light tracking-wider bg-blue-800 rounded"><i class="fas fa-plus mr-3"></i>Cadastrar usuário</a>
    </p>

    <p>Veja nossa lista de usuários</p>

    <div class="bg-white overflow-auto">
        <table class="min-w-3/4 bg-white">
            <thead class="bg-gray-800 text-white">
                <tr>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">ID</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Nome</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Email</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Username</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Admin</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Editar</th>
                    <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Apagar</th>
                </tr>
            </thead>

            @foreach($usuarios as $usuario)
                <tbody class="text-gray-700">
                    <tr @if ($loop->even) class="bg-gray-200" @endif>
                        <td class="w-1/3 text-left py-3 px-4">{{ $usuario['id'] }}</td>
                        <td class="w-1/3 text-left py-3 px-4">{{ $usuario['nome'] }}</td>
                        <td class="w-1/3 text-left py-3 px-4">{{ $usuario['email'] }}</td>
                        <td class="w-1/3 text-left py-3 px-4">{{ $usuario['username'] }}</td>
                        <td class="w-1/3 text-left py-3 px-4">@if($usuario['admin'] == 0) não @else sim @endif</td>
                        <td class="w-1/3 text-left py-3 px-4"><a class="px-3 py-1 font-bold text-green-900 bg-green-200 rounded-full" href="{{ route('usuarios.editar', $usuario['id']) }}"><i class="fas fa-edit">Editar</a></td>
                        <td class="w-1/3 text-left py-3 px-4"><a class="px-3 py-1 font-bold text-red-900 bg-red-200 rounded-full" href="{{ route('usuarios.apagar', $usuario['id']) }}"><i class="fas fa-trash-alt">Apagar</a></td>
                    </tr>
                </tbody>
            @endforeach
        </table>
    </div>
@endsection