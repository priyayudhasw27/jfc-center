<?php

namespace App\Models;

use CodeIgniter\Model;

class BoughtTicketModel extends Model
{
    protected $table = 'bought_ticket';
    protected $primaryKey = 'id_bought_ticket';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id_bought_ticket',
        'username',
        'bar_code',
        'id_jenis_ticket',
        'status',
    ];
}
