<?php

namespace App\Controllers;

use App\Models\PerfumeModel;
use App\Models\ContactModel;
use CodeIgniter\Controller;

class PerfumeController extends Controller
{
    protected $session;
    protected $validation;
    protected $model;

    public function __construct()
    {
        $this->session = session();
        $this->validation = \Config\Services::validation();
        $this->model = new PerfumeModel();

    }

    // Homepage
    public function home()
    {
        return view('perfumes/landing');
    }

    // List all perfumes
    public function index()
    {
        $data = [
            'perfumes' => $this->model->findAll(),
            'success'  => $this->session->getFlashdata('success')
        ];
        return view('perfumes/index', $data);
    }

    // AJAX Search
    public function search()
    {
        $query = $this->request->getGet('q');
        $perfumeModel = new \App\Models\PerfumeModel();

        $results = $perfumeModel
            ->like('name', $query)
            ->orLike('brand', $query)
            ->findAll();

        return $this->response->setJSON($results);
    }
    // Show single perfume
    public function show($id = null)
    {
        $perfume = $this->model->find($id);
        if (!$perfume) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Perfume with ID $id not found.");
        }

        return view('perfumes/show', [
            'perfume' => $perfume,
            'quote'   => 'Perfume is the art that makes memory speak.',
            'author'  => 'Francis Kurkdjian'
        ]);
    }

    // Create form
    public function create()
    {
        return view('perfumes/create', [
            'validation' => $this->validation
        ]);
    }

    // Store perfume
    public function store()
    {
        $this->validation->setRules([
            'name'        => 'required|min_length[2]',
            'brand'       => 'required',
            'description' => 'required',
            'image'       => 'permit_empty|valid_url',
            'rating'      => 'permit_empty|integer|greater_than_equal_to[1]|less_than_equal_to[5]'
        ]);

        if (!$this->validation->withRequest($this->request)->run()) {
            return view('perfumes/create', [
                'validation' => $this->validation
            ]);
        }

        $this->model->insert([
            'name'        => $this->request->getPost('name'),
            'brand'       => $this->request->getPost('brand'),
            'description' => $this->request->getPost('description'),
            'image'       => $this->request->getPost('image'),
            'rating'      => $this->request->getPost('rating'),
        ]);

        $this->session->setFlashdata('success', 'Perfume added successfully!');
        return redirect()->to(site_url('perfumes'));
    }

    // Edit form
    public function edit($id = null)
    {
        $perfume = $this->model->find($id);
        if (!$perfume) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Perfume not found.");
        }

        return view('perfumes/edit', [
            'perfume'    => $perfume,
            'validation' => $this->validation
        ]);
    }

    // Update perfume
    public function update($id)
    {
        $this->validation->setRules([
            'name'        => 'required|min_length[2]',
            'brand'       => 'required',
            'description' => 'required',
            'image'       => 'permit_empty|valid_url',
            'rating'      => 'permit_empty|integer|greater_than_equal_to[1]|less_than_equal_to[5]'
        ]);

        if (!$this->validation->withRequest($this->request)->run()) {
            return view('perfumes/edit', [
                'perfume'    => $this->model->find($id),
                'validation' => $this->validation
            ]);
        }

        $this->model->update($id, [
            'name'        => $this->request->getPost('name'),
            'brand'       => $this->request->getPost('brand'),
            'description' => $this->request->getPost('description'),
            'image'       => $this->request->getPost('image'),
            'rating'      => $this->request->getPost('rating'),
        ]);

        $this->session->setFlashdata('success', 'Perfume updated successfully!');
        return redirect()->to(site_url('perfumes/' . $id));
    }

    // Delete perfume
    public function delete($id)
    {
        $this->model->delete($id);
        $this->session->setFlashdata('success', 'Perfume deleted successfully!');
        return redirect()->to(site_url('perfumes'));
    }

    // About page
    public function about()
    {
        return view('perfumes/about');
    }

    // Contact form
    public function contact()
    {
        helper(['form', 'url']);
        $contactModel = new \App\Models\ContactModel();
        if ($this->request->getMethod() === 'POST') {
            $rules = [
                'name'    => 'required|min_length[3]',
                'email'   => 'required|valid_email',
                'message' => 'required|min_length[10]'
            ];
            if (!$this->validate($rules)) {
                return view('perfumes/contact', [
                    'validation' => $this->validator
                ]);
            }
            #getting value from the form
            $name = $this->request->getPost('name');
            $email = $this->request->getPost('email');
            $message = $this->request->getPost('message');

            #loading the model and saving
            $contactModel->save([
                'name'    => $name,
                'email'   => $email,
                'message' => $message
            ]);

            // sending msg of completion 
            return view('perfumes/contact', [
                'success'   => "Thank you, $name! Your message has been saved successfully.",
                'submitted' => $name
            ]);
            
        }

        return view('perfumes/contact');
    }

    // Admin view of contact messages
    public function viewMessages()
    {
        $contactModel = new ContactModel();
        $messages = $contactModel->orderBy('created_at', 'DESC')->findAll();

        return view('perfumes/messages', ['messages' => $messages]);
    }

    // Delete contact message
    public function deleteMessage($id)
    {
        $contactModel = new ContactModel();
        $contactModel->delete($id);

        return redirect()->to(site_url('contact/messages'))->with('success', 'Message deleted successfully!');
    }

    // API test page
    public function apiPage()
    {
        return view('perfumes/api_page');
    }

    // Return all perfumes as JSON
    public function getProducts()
    {
        $products = $this->model->findAll();
        return $this->response->setJSON($products);
    }
}
