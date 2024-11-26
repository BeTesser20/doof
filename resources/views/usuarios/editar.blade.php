{{-- views/usuarios/editar.blade.php --}}

@extends('base')

@section('titulo', 'Página de Usuário - Editar')

@section('conteudo')
    <h1>Usuário - Editar</h1>

    @if ($errors->any())
        <p>Preencha os campos corretamente.</p>

        <ul>
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ route('usuarios.editar', $usuario->id) }}" method="post">
        @csrf
        @method('put')

        <form method="post" action="{{ route('usuarios.gravar')}}" class="p-10 bg-white rounded shadow-xl">
            @csrf
            <div class="">
                <label class="block text-sm text-gray-600" for="nome">Nome</label>
                <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" value="{{ old('nome', $usuario->nome ?? '') }}" type="text" name="nome" placeholder="Nome do Usuário" value=""> 
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="email">Email</label>
                <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" value="{{ old('email', $usuario->email ?? '') }}" type="email" name="email" placeholder="Email"> 
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="username">Username</label>
                <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" value="{{ old('username', $usuario->username ?? '') }}" type="text" name="username" placeholder="Username" value=""> 
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="password">Password</label>
                <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" value="{{ old('password', $usuario->password ?? '') }}" type="password" name="password" placeholder="Password">
            </div>
            <div class="mt-2">
                <label class="block text-sm text-gray-600" for="admin">Admin</label>
                <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" value="{{ old('admin', $usuario->admin ?? '') }}" type="text" name="admin" placeholder="Admin">
                {{-- <select name="admin" class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" required="">
                    <option value="null">Selecione o Admin</option>
                    <option value="1">Sim</option>
                    <option value="0">Não</option>
                </select> --}}
            </div>
            <div class="mt-6">
                <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit"><i class="fas fa-save"></i> Gravar</button>
            </div>
        </form>
@endsection