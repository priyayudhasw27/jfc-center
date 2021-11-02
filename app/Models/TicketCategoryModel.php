<?php

namespace App\Models;

use CodeIgniter\Model;

class TicketCategoryModel extends Model
{
    protected $table = 'ticket_category';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $allowedFields = [
        'id',
        'nama',
        'tanggal',
        'start',
        'end',
        'kuota',
        'location',
        'location_link',
        'status',
    ];
}
