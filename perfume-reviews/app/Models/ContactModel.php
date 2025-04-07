<?php

namespace App\Models;
use CodeIgniter\Model;

class ContactModel extends Model
{
    protected $table = 'contact_messages'; 
    protected $primaryKey = 'id';

    protected $allowedFields = ['name', 'email', 'message'];

    // Enable timestamps so created_at is auto-filled
    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
    protected $updatedField  = ''; //  disables updated_at
}
