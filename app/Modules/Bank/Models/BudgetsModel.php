<?php

namespace Modules\Bank\Models;

use CodeIgniter\Model;


class BudgetsModel extends Model{
    protected $DBGroup              = 'default';
    protected $table                = 'budgets';
    protected $primaryKey           = 'id';

    protected $allowedFields = ['budget_name','update_amount','budget_amount','expense_categories','start_date','end_date','property_id',];
}