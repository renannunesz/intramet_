<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TbusuariosModel;
use App\Models\TbusuariosniveisModel;

class Usuarios extends BaseController
{
    private $cadUsuarios;
    private $nivelUsuarios;

    public function __construct()
    {
        $this->cadUsuarios = new TbusuariosModel();
        $this->nivelUsuarios = new TbusuariosniveisModel();
    }

    public function index()
    {

        return view('usuarios',[
            'usuarios' => $this->cadUsuarios->find(),
            'usuariostipo' => $this->nivelUsuarios->find()
        ]);

    }

    public function addStatus()
    {
        $novoStatus = $this->request->getPost('inputStatus');

        $dados = [
            'nome' => $novoStatus,
        ];

        $this->cadUsuarios->save($dados);

        return redirect()->to(base_url('/Cadastros/Status'));
    }

    public function delStatus($cod)
    {
        $this->cadUsuarios->where('cod', $cod)->delete();

        return redirect()->to(base_url('/Cadastros/Status'));
    }

    public function editStatus()
    {

        $codEditStatus = $this->request->getPost('codEditStatus');
        $nomeEditStatus = $this->request->getPost('inputEditStatus');

        $this->cadUsuarios->set('nome', $nomeEditStatus);
        $this->cadUsuarios->where('cod', $codEditStatus);
        $this->cadUsuarios->update();

        return redirect()->to(base_url('/Cadastros/Status'));
    }

    public function editSenha()
    {
        $usuarioCodigo = $this->request->getPost('codUsuarioSenha');
        $senhaNova = $this->request->getPost('inputNovaSenha');
        $senhaConfirmacao = $this->request->getPost('inputNovaSenhaConfirmar');    
        
        //dd($senhaNova != $senhaConfirmacao);

        if ($senhaNova != $senhaConfirmacao) {
            
            session()->setFlashdata('msg', 'Senhas não Correspondem');

            //return redirect()->to(base_url('/Home'));
            
        } else {

            $this->cadUsuarios->set('senha', $senhaNova)->where('cod', $usuarioCodigo)->update();

            return redirect()->to(base_url('/Home'));
        }

    }

}
