<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketPaymentModel extends Model
{
    protected $table = 'ticket_payment';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id',
        'id_invoice',
        'username',
        'bukti_pembayaran',
        'created_at',
    ];
}
