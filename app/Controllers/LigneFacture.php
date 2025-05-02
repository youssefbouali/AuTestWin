<?php

namespace App\Controllers;

use App\Models\LigneFactureModel;

class LigneFactureController extends BaseController
{
    public function index()
    {
        $model = new LigneFactureModel();
        $data['lignes'] = $model->findAll();
        return view('lignefacture/index', $data);
    }

    public function create()
    {
        return view('lignefacture/create');
    }

    public function store()
    {
        $validation = $this->validate([
            'facture_id'    => 'required|integer',
            'article_id'    => 'required|integer',
            'quantite'      => 'required|integer',
            'prix_unitaire' => 'required|numeric'
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        $model = new LigneFactureModel();
        $model->insert([
            'facture_id'    => $this->request->getPost('facture_id'),
            'article_id'    => $this->request->getPost('article_id'),
            'quantite'      => $this->request->getPost('quantite'),
            'prix_unitaire' => $this->request->getPost('prix_unitaire'),
        ]);

        return redirect()->to('/lignefacture')->with('success', 'Ligne de facture ajoutée avec succès');
    }
}