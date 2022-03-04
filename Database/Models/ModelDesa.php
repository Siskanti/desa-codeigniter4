<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelDesa extends Model
{
    protected $table = "desa";
    protected $primarykey = "id";
    protected $allowedFields = [
        'nomor_surat', 'jenis_surat', 'tanggal_surat', 'created_at', 'updated_at'
    ];
}
