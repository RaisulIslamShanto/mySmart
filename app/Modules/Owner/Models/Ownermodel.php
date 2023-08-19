<?php

namespace Modules\Owner\Models;

use CodeIgniter\Model;

class Ownermodel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'owners';
    protected $primaryKey           = 'owner_id';


    // protected $useAutoIncrement     = true;
    //protected $insertID             = 0;
    //protected $returnType           = 'array';
    //protected $useSoftDeletes       = false;
    //protected $protectFields        = true;
    protected $allowedFields = ['owner_id','name','email','password','contact_no','present_address','parmanent_address','nid','image','property_id'];

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
