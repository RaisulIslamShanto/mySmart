<?php

namespace Modules\Bank\Models;

use CodeIgniter\Model;


class BankListModel extends Model{
    protected $DBGroup              = 'default';
    protected $table                = 'bank_list';
    protected $primaryKey           = 'id';

    protected $allowedFields = ['bank_name','property_id',];
}