<?php

namespace App\Models;

use CodeIgniter\Model;

class PendaftaranModel extends Model
{
    protected $table         = 'pendaftaran';
    protected $primaryKey    = 'id';
    protected $returnType    = 'object';
    protected $allowedFields = ['pasienid', 'noregistrasi', 'tglregistrasi'];
}
