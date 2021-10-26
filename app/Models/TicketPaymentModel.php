<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketPaymentModel extends Model
{
    protected $table = 'ticket_payment';
    protected $primaryKey = 'id_ticket_payment';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id_ticket_payment',
        'id_bought_ticket',
        'username',
        'bukti_pembayaran',
        'created_at',
    ];
}
