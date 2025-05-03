<?php

namespace App\Models;

use CodeIgniter\Model;

class LigneFactureModel extends Model
{
    protected $table = 'ligne_factures';
    protected $primaryKey = 'id';
    protected $allowedFields = ['facture_id', 'article_id', 'quantite', 'prix_unitaire'];
}