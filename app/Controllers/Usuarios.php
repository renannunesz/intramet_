<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\tbusuariosModel;
use App\Models\tbusuariosniveisModel;

class Usuarios extends BaseController
{
    private $cadUsuarios;
    private $nivelUsuarios;

    public function __construct()
    {
        $this->cadUsuarios = new tbusuariosModel();
        $this->nivelUsuarios = new tbusuariosniveisModel();
    }

    public function index()
    {

        return view('usuarios',[
            'usuarios' => $this->cadUsuarios->find(),
            'usuariostipo' => $this->nivelUsuarios->find()
        ]);

    }

    public function addUser()
    {
        $nomeUser = $this->request->getPost('inputNomeUsuario');
        $nomeAcesso = $this->request->getPost('inputAcessoUsuario');
        $senhaUser = $this->request->getPost('inputSenhaUsuario');
        $tipoUser = $this->request->getPost('inputTipoUsuario');

        $dados = [
            'nome' => $nomeUser,
            'usuario' => $nomeAcesso,
            'senha' => $senhaUser,
            'codnivelusuario' => $tipoUser
        ];

        $this->cadUsuarios->save($dados);

        return redirect()->to(site_url('Cadastros/Usuarios'));
    }

    public function delStatus($cod)
    {
        $this->cadUsuarios->where('cod', $cod)->delete();

        return redirect()->to(site_url('/Cadastros/Status'));
    }

    public function editStatus()
    {

        $codEditStatus = $this->request->getPost('codEditStatus');
        $nomeEditStatus = $this->request->getPost('inputEditStatus');

        $this->cadUsuarios->set('nome', $nomeEditStatus);
        $this->cadUsuarios->where('cod', $codEditStatus);
        $this->cadUsuarios->update();

        return redirect()->to(site_url('/Cadastros/Status'));
    }

    public function editSenha()
    {
        $usuarioCodigo = $this->request->getPost('codUsuarioSenha');
        $senhaNova = $this->request->getPost('inputNovaSenha');
        $senhaConfirmacao = $this->request->getPost('inputNovaSenhaConfirmar');    
        
        //dd($senhaNova != $senhaConfirmacao);

        if ($senhaNova != $senhaConfirmacao) {
            
            session()->setFlashdata('msg', 'Senhas não Correspondem');

            //return redirect()->to(site_url('/Home'));
            
        } else {

            $this->cadUsuarios->set('senha', $senhaNova)->where('cod', $usuarioCodigo)->update();

            return redirect()->to(site_url('/Home'));
        }

    }

}
