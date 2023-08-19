<?php

namespace Modules\Super_admin\Models;

use CodeIgniter\Model;

class Stripemodel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'stripe';
    protected $primaryKey           = 'id';


    // protected $useAutoIncrement     = true;
    //protected $insertID             = 0;
    //protected $returnType           = 'array';
    //protected $useSoftDeletes       = false;
    //protected $protectFields        = true;
    protected $allowedFields = ['id', 'stripe_mode','stripe_api_key','stripe_test_api_key','stripe_serect_key','stripe_test_serect_key','status'];

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
