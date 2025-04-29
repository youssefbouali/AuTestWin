<?php 
namespace App\Models;

use CodeIgniter\Model;

class LigneLivraisonModel extends Model
{
    protected $table = 'ligneLivraisons';
    protected $primaryKey = 'id';
    
    protected $allowedFields = ['libelle', 'Qte', 'Prix_total'];
}