<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketBoughtModel extends Model
{
    protected $table = 'ticket_bought';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id',
        'username',
        'id_ticket_sub',
        'nama',
        'email',
        'no_hp',
        'bar_code',
        'status',
        'in_venue',
    ];
}
