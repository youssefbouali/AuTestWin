<?php

namespace App\Controllers;

class BnLivraisonController extends BaseController
{
    public function index(): string
    {
        $model = new BnLivraisonModel();
        $data['bnlivraison'] = $model->findAll();
        return view("bnlivraison_list", $data);
    }
    public function create() {
        return view('BnLivraison');
    }
}
