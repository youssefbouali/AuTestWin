<?php

namespace App\Models;

use CodeIgniter\Model;

class ClientModel extends Model
{
    protected $table      = 'clients';
    protected $primaryKey = 'id';

    protected $allowedFields = ['nom', 'email', 'adresse', 'telephone'];

    protected $validationRules = [
        'nom'        => 'required|string|max_length[255]',
        'email'      => 'required|valid_email|is_unique[clients.email]',
        'telephone'  => 'required|regex_match[/^[0-9]{10}$/]',
    ];

    // Méthode pour vérifier si un email est déjà utilisé
    public function checkEmailUnique($email)
    {
        return $this->where('email', $email)->first();
    }
}
