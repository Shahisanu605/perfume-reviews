<?php

namespace App\Controllers;

use App\Models\PerfumeModel;
use CodeIgniter\Controller;

class PerfumeController extends Controller
{
    public function index()
    {
        $model = new PerfumeModel();
        $data['perfumes'] = $model->findAll();

        $session = session();
        $data['success'] = $session->getFlashdata('success');

        return view('perfumes/index', $data);
    }
    public function home()
    {   
        // dd('Route is controller!'); 
        try {
            return view('perfumes/landing');
        } catch (\Throwable $e) {
            // Show what's wrong with the view
            die('Error loading view: ' . $e->getMessage());
        }
    }
    public function show($id = null)
    {
        $model = new PerfumeModel();
        $data['perfume'] = $model->find($id);

        if (!$data['perfume']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Perfume with ID $id not found.");
        }

        // Optional static quote
        $data['quote'] = 'Perfume is the art that makes memory speak.';
        $data['author'] = 'Francis Kurkdjian';

        return view('perfumes/show', $data);
    }

    public function create()
    {
        return view('perfumes/create');
    }

    public function store()
    {
        $model = new PerfumeModel();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name'        => 'required|min_length[2]',
            'brand'       => 'required',
            'description' => 'required',
            'image'       => 'permit_empty|valid_url'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('perfumes/create', [
                'validation' => $validation
            ]);
        }

        $model->insert([
            'name'        => $this->request->getPost('name'),
            'brand'       => $this->request->getPost('brand'),
            'description' => $this->request->getPost('description'),
            'image'       => $this->request->getPost('image'),
        ]);

        session()->setFlashdata('success', 'Perfume added successfully!');
        return redirect()->to(site_url('perfumes'));
    }

    public function edit($id = null)
    {
        $model = new PerfumeModel();
        $data['perfume'] = $model->find($id);

        if (!$data['perfume']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Perfume not found.");
        }

        return view('perfumes/edit', $data);
    }

    public function update($id)
    {
        $model = new PerfumeModel();
        $validation = \Config\Services::validation();

        $validation->setRules([
            'name'        => 'required|min_length[2]',
            'brand'       => 'required',
            'description' => 'required',
            'image'       => 'permit_empty|valid_url'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return view('perfumes/edit', [
                'perfume'    => $model->find($id),
                'validation' => $validation
            ]);
        }

        $model->update($id, [
            'name'        => $this->request->getPost('name'),
            'brand'       => $this->request->getPost('brand'),
            'description' => $this->request->getPost('description'),
            'image'       => $this->request->getPost('image'),
        ]);

        session()->setFlashdata('success', 'Perfume updated successfully!');
        return redirect()->to(site_url('perfumes/' . $id));
    }

    public function delete($id)
    {
        $model = new PerfumeModel();
        $model->delete($id);

        session()->setFlashdata('success', 'Perfume deleted successfully!');
        return redirect()->to(site_url('perfumes'));
    }
    
}
