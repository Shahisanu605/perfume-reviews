<?php

namespace App\Models;

use CodeIgniter\Model;

class PerfumeModel extends Model
{
    protected $table = 'perfumes';
    protected $primaryKey = 'id';

    // Include rating field for mass assignment
    protected $allowedFields = ['name', 'brand', 'description', 'image', 'rating'];

    // Enable automatic timestamps
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
}
