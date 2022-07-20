<?php

namespace App\Models;

use CodeIgniter\Model;

class roleModel extends Model
{
    protected $table      = 'roles';
    protected $primaryKey = 'role_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = 
    [
        'roles'
    ];

}

?>