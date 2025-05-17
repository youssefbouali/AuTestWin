<?php

namespace App\Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\ClientModel;

class ClientModelTest extends CIUnitTestCase
{
    protected $model;

    public function setUp(): void
    {
        parent::setUp();
        $this->model = new ClientModel();
    }

    public function testInsertClientValid()
    {
        $data = [
            'nom'          => 'Test Client',
            'email'        => 'testclient@example.com',
            'telephone'    => '0123456789',
            'adresse'      => '123 Test Street',
        ];

        $id = $this->model->insert($data);
        $this->assertGreaterThan(0, $id, "ID client inséré doit être > 0");
    }

    public function testInsertClientWithDuplicateEmail()
    {
        // Insertion d'un premier client
        $data1 = [
            'nom'          => 'Client Duplication',
            'email'        => 'duplicate@example.com',
            'telephone'    => '0987654321',
            'adresse'      => '456 Test Avenue',
        ];

        $this->model->insert($data1);

        // Tentative d'insertion avec le même email
        $data2 = [
            'nom'          => 'Client Duplication 2',
            'email'        => 'duplicate@example.com',
            'telephone'    => '0987654322',
            'adresse'      => '700 test avenue',
        ];

        // Vérifier si l'insertion échoue (email dupliqué)
        $result = $this->model->insert($data2);
		$this->assertFalse($result, "L'insertion devrait échouer à cause de l'email dupliqué");

    }
}
