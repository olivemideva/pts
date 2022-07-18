<?php

namespace App\Models;

use CodeIgniter\Model;

class releaseModel extends Model
{
    protected $table      = 'released';
    protected $primaryKey = 'release_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = 
    [
        'parole_officer','prisoner','released_on'
    ];

}

?>