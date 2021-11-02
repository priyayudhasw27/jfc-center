<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketSubCategoryModel extends Model
{
    protected $table = 'ticket_sub_category';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id',
        'id_ticket_category',
        'nama',
        'harga',
    ];
}
