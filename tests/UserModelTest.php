<?php
namespace App\Tests\Models;

use CodeIgniter\Test\CIUnitTestCase;
use App\Models\UserModel;

class UserModelTest extends CIUnitTestCase
{
    public function testFindAllUsers()
    {
        $model = new UserModel();
        $users = $model->findAll();

        $this->assertIsArray($users, "findAll retourne un tableau !");
    }

    public function testInsertUser()
    {
        $model = new UserModel();
        $data = ['name' => 'Jamila Dahi', 'email' => 'jda@gk.mt'];
        $id = $model->insert($data);

        $this->assertGreaterThan(0, $id, "ID user inséré > 0");
    }
}
