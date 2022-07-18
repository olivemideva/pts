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
        'first_name','last_name','other_name', 'email','national_id','mobile','password','role','gender','created_at','is_deleted'
    ];

}

?>