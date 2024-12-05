{{-- resources/views/usuarios/index.blade.php --}}

@extends('base')

@section('titulo', 'Usuários')

@section('conteudo')

    @if($errors->any())
        <div>
            <h4>Preenche a porcaria do formulário</h4>
            @foreach($errors->all() as $error)
                <p>{{ $error }}</p>
            @endforeach
        </div>
    @endif

    <h1 class="text-5xl font-semibold mb-8">Login</h1>

    <form method="post" action="{{ route('login') }}" class="p-10 rounded-3xl shadow-xl bg-orange-50">
        @csrf
        <div class="">
            <input style="background-color: #3f633e; color: #f4faec;" class="w-full p-3 rounded-full text-center" id="username" name="username" type="text" required="" placeholder="Usuário" aria-label="Usuário">
        </div>
        <div class="mt-6">
            <input style="background-color: #3f633e; color: #f4faec;" class="w-full p-3 rounded-full text-center" id="password" name="password" type="password" required="" placeholder="Senha" aria-label="Senha">
        </div>
        <div class="mt-6">
            <button class="p-4 px-10 text-white font-light tracking-wider bg-yellow-950 rounded-full" type="submit">Entrar</button>
        </div>
        <div class="mt-6">
            <button class="px-4 py-1 text-white font-light tracking-wider bg-yellow-950 rounded-full" type="submit">Entrar com o Google</button>
        </div>
    </form>
@endsection