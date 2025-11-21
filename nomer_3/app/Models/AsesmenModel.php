<?php

namespace App\Models;

use CodeIgniter\Model;

class AsesmenModel extends Model
{
    protected $table         = 'asesmen';
    protected $primaryKey    = 'id';
    protected $returnType    = 'object';
    protected $allowedFields = ['kunjunganid', 'keluhan_utama', 'keluhan_tambahan'];
}
