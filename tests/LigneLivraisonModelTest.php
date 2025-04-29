<?php

namespace Tests\App\Models;

use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;
use App\Models\LigneLivraisonModel;

class LigneLivraisonModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $refresh = true;
    protected $namespace = 'App';
    protected $model;

    public function setUp(): void
    {
        parent::setUp();
        $this->model = new LigneLivraisonModel();
    }

    // Test 1: Qte > 0 et Prix_total = 0 (devrait échouer)

    public function testQtePositivePrixZero()
    {
        $data = [
            'libelle' => 20,
            'Qte' => 5,      // Qte valide
            'Prix_total' => 0 // Prix invalide
        ];
        $result = $this->model->insert($data);
        $this->assertFalse($result);
        $this->assertEquals(0, $this->model->countAll());

        $errors = $this->model->errors();
        $this->assertArrayHasKey('Prix_total', $errors);
        $this->assertEquals('Le prix total doit être supérieur à 0', $errors['Prix_total']);
    }

    public function testPrixNegatif()
    {
        $data = [
            'libelle' => 20,
            'Qte' => 2,
            'Prix_total' => -10.50 // Prix invalide
        ];

        $result = $this->model->insert($data);
        $this->assertFalse($result);

        $errors = $this->model->errors();
        $this->assertArrayHasKey('Prix_total', $errors);
    }

    // Test 3: Cas valide (Qte > 0 et Prix > 0)
    // public function testCasValide()
    // {
    //     $data = [
    //         'libelle' => 'Produit Valide',
    //         'Qte' => 3,
    //         'Prix_total' => 45.99
    //     ];

    //     $id = $this->model->insert($data);
    //     $this->assertIsInt($id);
    //     $this->assertGreaterThan(0, $id);
    // }
}