<?php 
namespace App\Models;

use CodeIgniter\Model;

class FactureModel extends Model
{
    protected $table = 'factures';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['dateFact', 'client','total'];

    protected $validationRules  = [
        'dateFact' => 'required|valid_date',
        'client'   => 'required|string',
        'total'    => 'required|numeric',
    ];
}
    
