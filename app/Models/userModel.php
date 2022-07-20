<?php

namespace App\Models;

use CodeIgniter\Model;

class userModel extends Model
{
    protected $table      = 'users';
    protected $primaryKey = 'user_id';
    protected $useAutoIncrement = true;

    protected $allowedFields = 
    [
        'first_name_u','last_name_u','other_name', 'email','national_id','mobile','password','role','gender_u','created_at','is_deleted'
    ];

}

?>