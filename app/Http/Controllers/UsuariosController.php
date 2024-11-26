<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class UsuariosController extends Controller
{
    public function index() {
        $dados = Usuario::orderBy('nome', 'asc')->get();
        // dd($dados);
        return view('usuarios.index', [
            'usuarios' => $dados,
        ]);
    }

    public function cadastrar() {
        return view('usuarios.cadastrar');
    }

    public function gravar(Request $form) {
        // // dd($form);
        // echo $form->nome;
        $dados = $form->validate([
            'nome' => 'required|min:3',
            'email' => 'email|required|unique:usuarios',
            'username' => 'required|min:3',
            'password' => 'required|min:3',
            'admin' => 'boolean'
        ]);

        $dados['password'] = Hash::make($dados['password']);

        Usuario::create($dados);
        // echo 'Tudo certo!';
        return redirect()->route('usuarios');
    }

    // mostra na tela a confirmacao
    public function apagar(Usuario $usuario){
        // dd($usuario);
        return view('usuarios.apagar', [
            'usuario' => $usuario,
        ]);
    }

    // efetivamente deleta no banco
    public function deletar(Usuario $usuario){
        $usuario->delete();
        return redirect()->route('usuarios');
    }


    public function editar(Usuario $usuario) {
        return view('usuarios/editar', ['usuario' => $usuario]);
    }

    public function editarGravar(Request $form, Usuario $usuario) {
        $dados = $form->validate([
        'nome' => 'required|max:255',
        'email' => 'required|max:255',
        'username' => 'required|max:255',
        'password' => 'required|max:255',
        'admin' => 'boolean'
        ]);

        $usuario->fill($dados);
        $usuario->save();
        return redirect()->route('usuarios');
    }

    public function login(request $form) {
        if($form->isMethod('POST')){
            // dd($form);

            // pega os dados do form
            $credenciais = $form->validate([
                'username' => 'required',
                'password' => 'required',
            ]);

            // tenta fazer o login
            if(Auth::attempt($credenciais)){
                return redirect()->intended(route('index'));
            } else {
                return redirect()->route('login')->with('erro', 'Usuário ou senha inválidos');
            }
        }

        return view('usuarios.login');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('index');
    }
}