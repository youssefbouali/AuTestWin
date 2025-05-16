<?php

namespace App\Controllers;

use App\Models\ArticleModel;

class ArticleController extends BaseController
{
    public function index()
    {
        $model = new ArticleModel();
        $articles = $model->findAll();

        return view('articles/index', ['articles' => $articles]);
    }

    public function create()
    {
        return view('articles/create');
    }

    public function store()
    {
        $data = [
            'ref'       => $this->request->getPost('ref'),
            'libelle'   => $this->request->getPost('libelle'),
            'qte_stock' => $this->request->getPost('qte_stock'),
        ];

        $model = new ArticleModel();
        $model->insert($data);

        return redirect()->to('/articles');
    }
}

?>