<?php

namespace Modules\Bank\Models;

use CodeIgniter\Model;


class BalanceTransferModel extends Model{
    protected $DBGroup              = 'default';
    protected $table                = 'balance_transfer';
    protected $primaryKey           = 'id';

    protected $allowedFields = ['from_account','to_account_id','amount','transfer_date', 'note','property_id',];
}