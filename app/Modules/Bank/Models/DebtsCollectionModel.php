<?php

namespace Modules\Bank\Models;

use CodeIgniter\Model;


class DebtsCollectionModel extends Model{
    protected $DBGroup              = 'default';
    protected $table                = 'debts_collection';
    protected $primaryKey           = 'id';

    protected $allowedFields = ['amount','bank_account','date','property_id',];
}