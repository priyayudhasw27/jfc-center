<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketInvoiceDetailModel extends Model
{
    protected $table = 'ticket_invoice_detail';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id',
        'id_invoice',
        'id_ticket_bought',
    ];
}
