<?php

namespace Tests\App\Models;

use App\Models\LigneFactureModel;
use CodeIgniter\Test\CIUnitTestCase;
use CodeIgniter\Test\DatabaseTestTrait;

class LigneFactureModelTest extends CIUnitTestCase
{
    use DatabaseTestTrait;

    protected $refresh = true;

    public function testInsertLigneFacture()
    {
        $model = new LigneFactureModel();

        $data = [
            'facture_id'    => 1,
            'article_id'    => 2,
            'quantite'      => 5,
            'prix_unitaire' => 100.0
        ];

        $id = $model->insert($data);

        $this->assertIsInt($id);

        $inserted = $model->find($id);
        $this->assertEquals(5, $inserted['quantite']);
        $this->assertEquals(100.0, $inserted['prix_unitaire']);
    }

    public function testFindAllReturnsArray()
    {
        $model = new LigneFactureModel();

        $model->insert([
            'facture_id'    => 1,
            'article_id'    => 1,
            'quantite'      => 3,
            'prix_unitaire' => 50.0
        ]);

        $all = $model->findAll();
        $this->assertIsArray($all);
        $this->assertGreaterThan(0, count($all));
    }

    public function testUpdateLigneFacture()
    {
        $model = new LigneFactureModel();

        $id = $model->insert([
            'facture_id'    => 2,
            'article_id'    => 4,
            'quantite'      => 7,
            'prix_unitaire' => 80.0
        ]);

        $model->update($id, ['quantite' => 10]);

        $updated = $model->find($id);
        $this->assertEquals(10, $updated['quantite']);
    }
}