<?php

namespace App\Models;

use CodeIgniter\Model;

class DiagnosisModel extends Model
{
    protected $table         = 'diagnosis';
    protected $primaryKey    = 'id';
    protected $returnType    = 'object';
    protected $allowedFields = ['asesmenid', 'diagnosa', 'tindakan_penanganan'];
}
