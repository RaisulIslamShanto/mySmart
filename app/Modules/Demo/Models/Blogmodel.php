<?php

namespace Modules\Demo\Models;

use CodeIgniter\Model;


class Blogmodel extends Model{
    protected $DBGroup              = 'default';
    protected $table                = 'blogs';
    protected $primaryKey           = 'id';

    protected $allowedFields = ['blogtitle','bloguri','blogcontent','blogcategory', 'blogimage', 'property_id'];
}