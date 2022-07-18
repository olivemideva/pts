<?php

namespace App\Models;

use CodeIgniter\Model;

class detaineeModel extends Model
{
    protected $table      = 'detainees';
    protected $primaryKey = 'detainee_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = 
    [
        'first_name','last_name','other_name','age','arrested_by','arrested_on','arrested_time','gender','posessions','is_guilty','is_admitted','arrested_for'
    ];

}

?>