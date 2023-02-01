<?php

namespace App\Models;

use CodeIgniter\Model;

class IndexModel extends Model
{
    protected $table            = 'usuario';
    protected $primaryKey       = 'usr';
    protected $allowedFields    = ['usr','password'];
}
