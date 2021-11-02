<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketCartModel extends Model
{
    protected $table = 'ticket_cart';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id',
        'username',
        'id_ticket_sub',
        'nama',
        'email',
        'no_hp',
    ];
}
