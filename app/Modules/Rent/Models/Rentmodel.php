<?php

namespace Modules\Rent\Models;

use CodeIgniter\Model;

class Rentmodel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'rent';
    protected $primaryKey           = 'id';
    // protected $useAutoIncrement     = true;
    // protected $insertID             = 0;
    // protected $returnType           = 'array';
    // protected $useSoftDeletes       = false;
    // protected $protectFields        = true;
    protected $allowedFields        = ['id','floor_id','unit_id','month','year','renter_name','tenent_id','tenent_image','rent','water_bill','gas_bill','electric_bill','security_bill','utility_bill','other_bill','total_rent','issue_date','bill_paid_date','bill_status','property_id'];

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
