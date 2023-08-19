<?php

namespace Modules\Tenant\Models;

use CodeIgniter\Model;

class Tenantmodel extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tenants';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        'tename',
        'teemail',
        'tepass',
        'tecontrctno',
        'teads',
        'tenid',
        'floorno',
        'unitno',
        'teadvancerent',
        'terentpermonth',
        'teissuedate',
        'terentmonth',
        'terentyear',
        'testatus',
        'teownerphoto',
        'property_id',
    ];

    // Dates
    protected $useTimestamps        = false;
    protected $dateFormat           = 'datetime';
    protected $createdField         = 'created_at';
    protected $updatedField         = 'updated_at';
    protected $deletedField         = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks       = true;
    protected $beforeInsert         = [];
    protected $afterInsert          = [];
    protected $beforeUpdate         = [];
    protected $afterUpdate          = [];
    protected $beforeFind           = [];
    protected $afterFind            = [];
    protected $beforeDelete         = [];
    protected $afterDelete          = [];
}
