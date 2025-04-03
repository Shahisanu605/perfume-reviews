<?php

namespace App\Models;

use CodeIgniter\Model;

class PerfumeModel extends Model
{
    protected $table = 'perfumes';
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'brand', 'description', 'image', 'rating'];
    protected $useTimestamps = true;
}
