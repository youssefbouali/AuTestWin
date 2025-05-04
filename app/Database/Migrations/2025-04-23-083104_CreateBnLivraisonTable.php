<?php

namespace App\Database\Migrations;
use CodeIgniter\Database\Migration;

class CreateBnLivraisonTable extends Migration
{
    public function up()
    {
		$this->forge->dropTable('bnlivraison', true);
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 5,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'datecreation' => [
                'type' => 'DATETIME',
                'null' => true,
            ],
            'client' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],/*
            'id_boncommande' => [
                'type' => 'INT',
                'constraint' => 11,
            ],*/
        ]);
        $this->forge->addKey('id', true);
        $this->forge->createTable('bnlivraison');
		
		//$this->forge->addForeignKey('id_boncommande', 'ligneboncommande', 'id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
      //  $this->forge->dropTable('bnlivraison');
    }
}