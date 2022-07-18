<?php

namespace App\Models;

use CodeIgniter\Model;

class punishmentModel extends Model
{
    protected $table      = 'punishments';
    protected $primaryKey = 'punishment_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = 
    [
        'defendant','punishment','sentence','fine','community_service','is_completed'
    ];

}

?>