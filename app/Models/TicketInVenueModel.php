<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketInVenueModel extends Model
{
    protected $table = 'ticket_in_venue';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id',
        'tanggal',
        'waktu',
        'username',
        'nama_lengkap',
        'id_ticket_bought',
        'id_ticket_sub',
    ];
}
