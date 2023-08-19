<?php

namespace Modules\Bank\Models;

use CodeIgniter\Model;


class SettingModel extends Model{
    protected $DBGroup              = 'default';
    protected $table                = 'application_setting';
    protected $primaryKey           = 'id';

    protected $allowedFields = ['company_name','company_phone','web_site','company_address','default_currency','Number_of_data_per_page','registration_type','property_id',];
}