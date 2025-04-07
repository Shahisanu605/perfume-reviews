<?php

namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useTimestamps = false;
    protected $allowedFields    = ['username', 'email', 'password', 'role'];

    // Optional: Automatically manage created_at/updated_at if you have them
    // protected $useTimestamps    = true;
    protected $createdField     = 'created_at';
    // protected $updatedField     = 'updated_at';

    protected $returnType       = 'array';
}
