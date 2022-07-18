<?php

namespace App\Models;

use CodeIgniter\Model;

class reviewModel extends Model
{
    protected $table      = 'reviews';
    protected $primaryKey = 'review_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = 
    [
        'participation','behaviour','team_work','social_interactions','prisoner','created_at'
    ];

}

?>