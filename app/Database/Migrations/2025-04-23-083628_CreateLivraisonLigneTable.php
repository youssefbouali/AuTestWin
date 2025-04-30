<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLivraisonLigneTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'libelle' => [
                'type' => 'INT',
            ],
            'Qte' => [
                'type' => 'INT',
            ],
            'Prix_total' => [
                'type' => 'FLOAT',
            ],
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('lignelivraisons');
    }

    public function down()
    {
        //
    }
}
