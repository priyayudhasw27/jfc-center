<?php

namespace App\Models;

use CodeIgniter\Model;

class PenontonModel extends Model
{
    protected $table = 'penonton';
    protected $primaryKey = 'id_penonton';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id_penonton',
        'nama_lengkap',
        'jenis_kelamin',
        'email',
        'nomor_hp',
        'alamat',
        'username',
        'created_at',
    ];
}
