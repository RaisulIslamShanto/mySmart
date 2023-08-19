<?php


namespace Modules\Demo\Models;

use CodeIgniter\Model;


class Categorymodel extends Model{
    protected $DBGroup              = 'default';
    protected $table                = 'categories';
    protected $primaryKey           = 'id';

    protected $allowedFields = ['categoryname', 'categoryuri', 'categorydescription', 'parentcategory', 'categoryimage', 'property_id'];
}