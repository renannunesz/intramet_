<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\TbenvolvidosModel;

class Envolvidos extends BaseController
{
    private $envolvidosModel;

    public function __construct()
    {
        $this->envolvidosModel = new tbenvolvidosModel();
    }

    public function dadosEnvolvidos()
    {
        $db = db_connect();
        $builder = $db->table('tbenvolvidos e');
        $builder->select('e.cod, e.nome, s.descricao');
        $builder->join('tbsetores s', 's.cod = e.codsetor');
        $builder->orderBy('e.cod', 'ASC');
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function index()
    {
        return view('envolvidos', [
            'envolvidos' => $this->dadosEnvolvidos()
        ]);
    }

}