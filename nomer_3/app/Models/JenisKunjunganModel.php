<?php

namespace App\Models;

use CodeIgniter\Model;

class JeniskunjunganModel extends Model
{
    protected $table         = 'jenis_kunjungan';
    protected $primaryKey    = 'id';
    protected $returnType    = 'object';
    protected $allowedFields = ['jenis', 'keterangan'];
}
