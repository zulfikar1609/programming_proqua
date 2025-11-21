<?php

namespace App\Models;

use CodeIgniter\Model;

class kunjunganModel extends Model
{
    protected $table         = 'kunjungan';
    protected $primaryKey    = 'id';
    protected $returnType    = 'object';
    protected $allowedFields = ['pendaftaranpasienid', 'jenis_kunjungan', 'tglkunjungan'];
}
