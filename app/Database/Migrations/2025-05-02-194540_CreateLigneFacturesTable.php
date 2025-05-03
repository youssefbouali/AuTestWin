<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateLigneFacturesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id'            => [
                'type'           => 'INT',
                'auto_increment' => true,
                'unsigned'       => true,
            ],
            'facture_id'    => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'article_id'    => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'quantite'      => [
                'type'       => 'INT',
                'unsigned'   => true,
            ],
            'prix_unitaire' => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'total'         => [
                'type'       => 'DECIMAL',
                'constraint' => '10,2',
            ],
            'created_at'    => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
            'updated_at'    => [
                'type'    => 'DATETIME',
                'null'    => true,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->addForeignKey('facture_id', 'factures', 'id', 'CASCADE', 'CASCADE');
        $this->forge->addForeignKey('article_id', 'articles', 'id', 'CASCADE', 'CASCADE');
        $this->forge->createTable('ligne_factures');
    }

    public function down()
    {
        //$this->forge->dropTable('ligne_factures');
    }
}
