<?php

namespace Modules\Bank\Models;

use CodeIgniter\Model;


class BankAccountModel extends Model{
    protected $DBGroup              = 'default';
    protected $table                = 'bank_account';
    protected $primaryKey           = 'id';

    protected $allowedFields = ['user_name','account_holders_name','bank_name_id','account_number', 'initial_balance','property_id',];
}