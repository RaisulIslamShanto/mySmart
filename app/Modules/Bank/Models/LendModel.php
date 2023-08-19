<?php

namespace Modules\Bank\Models;

use CodeIgniter\Model;


class LendModel extends Model{
    protected $DBGroup              = 'default';
    protected $table                = 'lend';
    protected $primaryKey           = 'id';

    protected $allowedFields = ['amount','bank_account','date','property_id',];
}