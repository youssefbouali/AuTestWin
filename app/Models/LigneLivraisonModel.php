<?php 
namespace App\Models;

use CodeIgniter\Model;

class LigneLivraisonModel extends Model
{
    protected $table = 'lignelivraisons';
    protected $primaryKey = 'id';
	protected $validationRules = [
		'libelle' => 'required|string',
		'Qte' => 'required|numeric|greater_than[0]',
		'Prix_total' => 'required|numeric|greater_than[0]',
	];
    
    protected $allowedFields = ['libelle', 'Qte', 'Prix_total'];
}