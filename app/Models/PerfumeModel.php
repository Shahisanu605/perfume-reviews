<?php

namespace App\Models;

use CodeIgniter\Model;

class PerfumeModel extends Model
{
    protected $table = 'perfumes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'brand', 'description', 'image'];
    
    // Enable automatic timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
