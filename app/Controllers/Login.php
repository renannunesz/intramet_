<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\tbusuariosModel;

class Login extends BaseController
{

    private $usuariosModel;

    public function __construct()
    {
        $this->usuariosModel = new tbusuariosModel();
    }

    public function index()
    {
        return view('login');
    }

    public function signIn()
    {
        $usuario = $this->request->getPost('nomeUsuario');
        $senha = $this->request->getPost('senhaUsuario');

        $user = $this->usuariosModel->where('usuario', $usuario)->first();

        if (empty($user) == false) {

            if ($senha == $user["senha"]) {                

                session()->start();
                session()->set('user' , $user['nome']);
                session()->set('usernivel', $user['codnivelusuario']);             
                
                return view('page head')
                . view('navbar')
                . view('home', [
                    'usuario' => $user['nome']
                ]);

            } else {

                return view('mensagens', [
                    'mensagem' => 'Senha Inválida',
                    'tipoMensagem'  => 'is-warning',
                    'link' => 'public/'
                ]);

            }
            
        } else {

            return view('mensagens', [
                'mensagem'      => 'Usuario Inválido',
                'tipoMensagem'  => 'is-warning',
                'link'          => 'public/'
            ]);
        }
    }

    public function signOut()
    {
        session()->set('user' , '');    
        session_unset();
        session_destroy();
        return view('/Login');
    }
}
