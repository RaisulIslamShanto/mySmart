<?php

namespace Modules\Bank\Models;

use CodeIgniter\Model;


class ExpensesModel extends Model{
    protected $DBGroup              = 'default';
    protected $table                = 'expenses';
    protected $primaryKey           = 'id';

    protected $allowedFields = ['expense_category','bank_account','amount','reference','description','note','add_attachment','date','property_id',];
}