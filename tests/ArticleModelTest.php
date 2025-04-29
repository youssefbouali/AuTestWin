<?php

namespace App\Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\ArticleModel;

class ArticleModelTest extends CIUnitTestCase
{
    public function testFindAllArticles()
    {
        $model = new ArticleModel();
        $articles = $model->findAll();

        $this->assertIsArray($articles, "findAll doit retourner un tableau !");
    }

    public function testInsertArticle()
    {
        $model = new ArticleModel();
        $data = [
            'ref' => 'ART001',
            'libelle' => 'Article Test',
            'qte_stock' => 10
        ];
        
        $id = $model->insert($data);
        $this->assertGreaterThan(0, $id, "ID article inséré doit être > 0");
    }

    public function testUniqueReference()
    {
        $model = new ArticleModel();
        $data1 = [
            'ref' => 'ART002',
            'libelle' => 'Article Test 2',
            'qte_stock' => 5
        ];
        
        $model->insert($data1);
        
        // Tentative d'insertion avec la même référence
        $data2 = [
            'ref' => 'ART002',
            'libelle' => 'Article Test 3',
            'qte_stock' => 8
        ];
        
        $this->expectException(\CodeIgniter\Database\Exceptions\DatabaseException::class);
        $model->insert($data2);
    }
}