<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketBookedSeatModel extends Model
{
    protected $table = 'ticket_booked_ticket';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id',
        'id_ticket_seat',
        'id_ticket_bought',
        'id_ticket_sub',
    ];
}
