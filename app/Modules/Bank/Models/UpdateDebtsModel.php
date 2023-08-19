<?php

namespace Modules\Bank\Models;

use CodeIgniter\Model;


class UpdateDebtsModel extends Model{
    protected $DBGroup              = 'default';
    protected $table                = 'update_debts_loans';
    protected $primaryKey           = 'id';

    protected $allowedFields = ['amount','bank_name','account_holder','date','type','property_id',];
}