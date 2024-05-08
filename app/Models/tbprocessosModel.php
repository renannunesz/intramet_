<?php

namespace App\Models;

use CodeIgniter\Model;

class TbprocessosModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'tbprocessos';
    protected $primaryKey       = 'cod';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = [
        'cod',
        'datainicio',
        'codempresa',
        'codservico',
        'codenvolvido',
        'contato',
        'codstatus',
        'observacao',
        'numeroprocesso',
        'financeiro',
        'datafim',
        'tempodecorrido',
        'caminhodocprocesso',
        'nomedocprocesso'
    ];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];
}
