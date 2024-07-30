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
        ///dd(base_url('Login/signIn'));
        $usuario = $this->request->getPost('nomeUsuario');
        $senha = $this->request->getPost('senhaUsuario');
        $user = $this->usuariosModel->where('usuario', $usuario)->first();

        if (is_null($user)) {

            session()->setFlashdata('msg', 'Usuário Invalido!');

            return redirect('Login');
            
        } else {

            if ($senha == $user['senha']) {

                session()->set('Logado', true);
                session()->set('nome', $user['nome']);
                session()->set('nivel', $user['codnivelusuario']);
                session()->set('codigousuario', $user['cod']);

                return redirect('Home');

            } else {

                session()->setFlashdata('msg', 'Senha Invalida!');

                return redirect('Login');
            }
            
        }

    }

    public function signOut()
    {
        session()->set('user' , '');    
        session_unset();
        session_destroy();
        return redirect('/');
    }
}
