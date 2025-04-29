<?php 
namespace App\Models;

use CodeIgniter\Model;

class BnLivraisonModel extends Model
{
    protected $table = 'bnlivraison';
    protected $primaryKey = 'id';
	protected $validationRules = [
		'client' => 'required',
		'datecreation' => 'required|valid_date',
	];


    protected $allowedFields = ['datecreation', 'client'];
}
