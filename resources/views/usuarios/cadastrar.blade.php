{{-- views/usuarios/cadastrar.blade.php --}}

@extends('base')

@section('titulo', 'Cadastrar | Usuário')

@section('conteudo')
    <p>Preencha o formuliário</p>

    @if($errors->any())
        <div>
            <h3>Deu ruim</h3>
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <form method="post" action="{{ route('usuarios.gravar')}}" class="p-10 bg-white rounded shadow-xl">
        @csrf
        <div class="">
            <label class="block text-sm text-gray-600" for="nome">Nome</label>
            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" required="" type="text" name="nome" placeholder="Nome" value="{{ old('nome') }}"> 
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="email">Email</label>
            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" required="" type="email" name="email" placeholder="Email" value="{{ old('email') }}"> 
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="username">Username</label>
            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" required="" type="text" name="username" placeholder="Username" value="{{ old('username') }}"> 
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="password">Password</label>
            <input class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" required="" type="password" name="password" placeholder="Password" value="{{ old('password') }}"> 
        </div>
        <div class="mt-2">
            <label class="block text-sm text-gray-600" for="admin">Admin</label>
            <select name="admin" class="w-full px-5  py-1 text-gray-700 bg-gray-200 rounded" required="">
                <option value="null">Selecione o Admin</option>
                <option value="1">Sim</option>
                <option value="0">Não</option>
            </select>
        </div>
        <div class="mt-6">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-gray-900 rounded" type="submit"><i class="fas fa-save"></i> Gravar</button>
        </div>
    </form>
@endsection