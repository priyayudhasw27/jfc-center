<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketStudioModel extends Model
{
    protected $table = 'ticket_studio';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id',
        'nama',
        'status',
    ];
}
