<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class CreateFacturesTable extends Migration
{
    public function up()
    {
        $this->forge->addField([
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => true,
                'auto_increment' => true
            ],
            'dateFact' => [
                'type' => 'DATE',
                'null' => false
            ],
            'client' => [
                'type' => 'VARCHAR',
                'constraint' => 255,
                'null' => false
            ],
            'total' => [
                'type' => 'DECIMAL',
                'constraint' => '10,2',
                'null' => false
            ],
            'created_at' => [
                'type' => 'DATETIME',
                'null' => true
            ],
            'updated_at' => [
                'type' => 'DATETIME',
                'null' => true
            ]
        ]);

        $this->forge->addKey('id', true);
        $this->forge->createTable('factures');
    }

    public function down()
    {
        $this->forge->dropTable('factures');
    }
}