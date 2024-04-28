<?php

namespace App\Models;

use CodeIgniter\Model;

class Log_inModel extends Model
{
    protected $table = 'tb_user';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username', 'password', 'role'];

    public function checkCredentials($username, $password)
    {
        return $this->where('username', $username)
                    ->where('password', $password)
                    ->first();
    }
}

