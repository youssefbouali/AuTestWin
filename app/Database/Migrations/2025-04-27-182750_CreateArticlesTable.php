<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateArticlesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type'           => 'INT',
                'constraint'     => 9,
                'unsigned'       => true,
                'auto_increment' => true,
            ],
            'ref' => [
                'type'       => 'VARCHAR',
                'constraint' => 50,
                'unique'     => true,
            ],
            'libelle' => [
                'type'       => 'VARCHAR',
                'constraint' => 100,
            ],
            'qte_stock' => [
                'type'       => 'INT',
                'constraint' => 11,
                'unsigned'   => true,
                'default'    => 0,
            ],
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('articles', true);
        
    }

    public function down()
    {
        //$this->forge->dropTable('articles', true);
    }
}