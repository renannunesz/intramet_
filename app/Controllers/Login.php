<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\tbusuariosModel;
use CodeIgniter\Database\Exceptions\DatabaseException;

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


    /* TESTE DE CONEXÃO COM O BANCO
    public function signIn()
    {
        $db = \Config\Database::connect();
        
        try {
            if ($db->connect()) {
                echo "Conexão com o banco de dados foi bem-sucedida!";
            }
        } catch (DatabaseException $e) {
            echo "Falha na conexão com o banco de dados: " . $e->getMessage();
        }
    }
    */

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
