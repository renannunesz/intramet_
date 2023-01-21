<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TbatasModel;

class Atas extends BaseController
{
    private $atasModel;

    public function __construct()
    {
        $this->atasModel = new tbatasModel();
    }

    public function dadosAtas()
    {
        $db = db_connect();
        $builder = $db->table('tbatas a');
        $builder->select('a.cod, a.data, a.descricao, s.descricao, a.participantes ');
        $builder->join('tbsetores s', 's.cod = a.codsetor');
        $builder->orderBy('e.cod', 'ASC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function listarAtas()
    {
        return view('grid_atas', [
            'atas' => $this->dadosAtas()
        ]);
    }

    public function index()
    {
        return view('ata');
    }

    public function salvar() 
    {
        /*
        if ($this->atasModel->save($this->request->getPost())) {
            //return view('ata');
            echo "Ata salva";
        } else {
            echo "Erro";
        }
        
        $this->atasModel->save([
            'data' => $this->request->getVar('data'),
            'descricao' => $this->request->getVar('descricao'),
            'codsetor' => $this->request->getVar('codsetor'),
            'participantes' => $this->request->getVar('participantes'),
        ]);

        echo view('ata');
        */

        $this->atasModel->save($this->request->getPost());
        return view('ata');
    }

}
