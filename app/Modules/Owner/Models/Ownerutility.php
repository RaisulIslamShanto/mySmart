<?php

namespace Modules\Owner\Models;

use CodeIgniter\Model;

class Ownerutility extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'owners_utility';
    protected $primaryKey           = 'id';

    // protected $useAutoIncrement     = true;
    // protected $insertID             = 0;
    // protected $returnType           = 'array';
    // protected $useSoftDeletes       = false;
    // protected $protectFields        = true;
    protected $allowedFields        = ['id','floor_id','unit_id','owner_name','month','year','water_bill','electric_bill','gas_bill','security_bill','utility_bill','others_bill','total_rent','issue_date','owner_id','property_id'];

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
