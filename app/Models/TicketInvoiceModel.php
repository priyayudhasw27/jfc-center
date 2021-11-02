<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketInvoiceModel extends Model
{
    protected $table = 'ticket_invoice';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id',
        'username',
        'total',
        'created_at',
        'expired_date',
        'status',
    ];
}
