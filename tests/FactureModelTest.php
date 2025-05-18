<?php

namespace Tests\Models;

use App\Models\FactureModel;
use CodeIgniter\Test\CIUnitTestCase;

class FactureModelTest extends CIUnitTestCase
{
    protected $model;

    protected function setUp(): void
    {
        parent::setUp();
        $this->model = new FactureModel();
    }

    public function testCreateAndFindFacture()
    {
        // Test data
        $testData = [
            'dateFact' => '2023-12-01',
            'client' => 'Test Client',
            'total' => 99.99
        ];

        // Create
        $id = $this->model->insert($testData);
        $this->assertIsInt($id);

        // Read
        $facture = $this->model->find($id);
        $this->assertEquals('Test Client', $facture['client']);
        $this->assertEquals(99.99, (float)$facture['total']);
    }

    public function testFailedValidation()
{
    // Provide invalid (but non-empty) data
    $badData = [
        'dateFact' => 'not-a-date',
        'client'   => '',
        'total'    => 'not-a-number',
    ];

    $result = $this->model->insert($badData);

    $this->assertFalse($result);
    $this->assertNotEmpty($this->model->errors()); // Check that validation errors exist
}
}