<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketSeatModel extends Model
{
    protected $table = 'ticket_seat';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id',
        'nama',
        'id_studio',
        'status',
    ];
}
