<?php

namespace Modules\Super_admin\Models;

use CodeIgniter\Model;

class Pakagemodel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'pakage';
    protected $primaryKey           = 'id';


    // protected $useAutoIncrement     = true;
    //protected $insertID             = 0;
    //protected $returnType           = 'array';
    //protected $useSoftDeletes       = false;
    //protected $protectFields        = true;
    protected $allowedFields = ['id','pakage_title','pakage_objective','duration','cost','property_limit','status','employee_limit','d_m_y','how_many','price_key'];

    // // Dates
    // protected $useTimestamps        = false;
    // protected $dateFormat           = 'datetime';
    // protected $createdField         = 'created_at';
    // protected $updatedField         = 'updated_at';
    // protected $deletedField         = 'deleted_at';

    // // Validation
    // protected $validationRules      = [];
    // protected $validationMessages   = [];
    // protected $skipValidation       = false;
    // protected $cleanValidationRules = true;

    // // Callbacks
    // protected $allowCallbacks       = true;
    // protected $beforeInsert         = [];
    // protected $afterInsert          = [];
    // protected $beforeUpdate         = [];
    // protected $afterUpdate          = [];
    // protected $beforeFind           = [];
    // protected $afterFind            = [];
    // protected $beforeDelete         = [];
    // protected $afterDelete          = [];
}
