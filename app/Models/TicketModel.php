<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketModel extends Model
{
    protected $table = 'ticket';
    protected $primaryKey = 'id_jenis_ticket';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id_jenis_ticket',
        'nama_ticket',
        'harga',
        'design',
    ];
}
