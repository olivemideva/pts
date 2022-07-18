<?php

namespace App\Models;

use CodeIgniter\Model;

class prisonerModel extends Model
{
    protected $table      = 'prisoners';
    protected $primaryKey = 'prisoner_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = 
    [
        'first_name','last_name','arrested_for','defendant_id','admitted_on','cell_no','is_recommended','is_released'
    ];

}

?>