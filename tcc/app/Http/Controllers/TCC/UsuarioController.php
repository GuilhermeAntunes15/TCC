<?php

namespace App\Http\Controllers\TCC;

date_default_timezone_set('America/Sao_Paulo');

use App\Http\Controllers\Controller;
use App\Http\Requests\UsuarioRequest;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class UsuarioController extends Controller
{
    public function index()
    {
        try {
            return view('Login');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function login(Request $request)
    {
        $api = env("API_URL") . "/api/login";

        $login = Http::post($api, [
            'usuario' => $request->usuario,
            'senha' => $request->senha
        ]);

        $login = json_decode($login->body());

        if (empty($login->error)) {
            session(['token' => $login->access_token]);
            $credentials = [
                'US_LOGIN' => $request->usuario,
                'password' => $request->senha
            ];
            if (Auth::attempt($credentials)) {
                return redirect()->route("index");
            }
        } else {
            abort(500, $login->error);
            }
    }


    public function create()
    {
        try {
            return view('pages.Signup');
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        $api = env("API_URL") . '/api/register';
        $linguagem = Http::withHeaders(['Authorization' => 'Bearer ' . session()->get('token')])->post($api, [
            'login' => $request->input('login'),
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'senha' => $request->input('senha'),
            'dt_nasc' => $request->input('dt_nasc'),
            'ds_auditoria' => "Usuario criado"
        ])->throw(function ($linguagem, $e) {
            abort(500, $e->getMessage());
        })->json();

        return redirect()->route('users.index');
    }

    public function show($id)
    {
        
        try {
            $nome = Auth::user()->US_NOME;
            $email = Auth::user()->US_EMAIL;
            $usuario = Auth::user()->US_LOGIN;
            return view('pages.UsuarioPerfil', compact('nome', 'email', 'usuario'));
        } catch (Exception $e) {
            abort(500, $e->getMessage());
        }
    }


    public function edit($id)
    {

        
    }

    public function update(Request $request, $id)
    {

    }

    public function destroy($id)
    {
    }

    public function sair()
    {
        Auth::logout();
        return redirect()->route('index');
    }
}
