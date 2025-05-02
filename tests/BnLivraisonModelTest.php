<?php
namespace App\Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\BnLivraisonModel;

class BnLivraisonModelTest extends CIUnitTestCase
{
    public function testFindAll()
    {
        $model = new BnLivraisonModel();
        $bnlivraison = $model->findAll();

        $this->assertIsArray($bnlivraison, "findAll retourne un tableau !");
    }

	public function testInsertFailsWithoutClient()
	{
		$model = new BnLivraisonModel();
		$data = [
			'datecreation' => '2025-04-23 10:00:00',
			// 'client' => "123" // manquant volontairement
		];

		$result = $model->insert($data);

		$this->assertFalse($result, "L'insertion doit échouer sans 'client'");
		$errors = $model->errors();
		$this->assertArrayHasKey('client', $errors);
	}
	
	public function testInsertSucceedsWithValidData()
	{
		$model = new BnLivraisonModel();
		$data = [
			'datecreation' => '2025-04-23 10:00:00',
			'client' => "123"
		];

		$result = $model->insert($data);

		$this->assertIsInt($result, "L'insertion avec données valides doit retourner un ID.");
		$this->assertGreaterThan(0, $result, "L'insertion doit réussir et retourner un ID valide.");
	}


}
