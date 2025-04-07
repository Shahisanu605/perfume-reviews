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

    public function home()
    {
        return view('perfumes/landing');
    }

    public function index()
    {
        $data = [
            'perfumes' => $this->model->findAll(),
            'success'  => $this->session->getFlashdata('success')
        ];
        return view('perfumes/index', $data);
    }

    public function search()
    {
        $query = $this->request->getGet('q');
        $results = $this->model
            ->like('name', $query)
            ->orLike('brand', $query)
            ->findAll();

        return $this->response->setJSON($results);
    }

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

    public function create()
    {
        echo(session()->get('role'));
        
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Access denied. Admins only.');
        }

        return view('perfumes/create', [
            'validation' => $this->validation
        ]);
    }

    public function store()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Access denied. Admins only.');
        }

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

    public function edit($id = null)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Access denied. Admins only.');
        }

        $perfume = $this->model->find($id);
        if (!$perfume) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound("Perfume not found.");
        }

        return view('perfumes/edit', [
            'perfume'    => $perfume,
            'validation' => $this->validation
        ]);
    }

    public function update($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Access denied. Admins only.');
        }

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

    public function delete($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Access denied. Admins only.');
        }

        $this->model->delete($id);
        $this->session->setFlashdata('success', 'Perfume deleted successfully!');
        return redirect()->to(site_url('perfumes'));
    }

    public function about()
    {
        return view('perfumes/about');
    }

    // ✅ UPDATED CONTACT METHOD
    public function contact()
    {
        helper(['form', 'url']);
        $contactModel = new ContactModel();

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

            $contactModel->save([
                'name'    => $this->request->getPost('name'),
                'email'   => $this->request->getPost('email'),
                'message' => $this->request->getPost('message')
            ]);

            // ✅ Flash message and redirect
            session()->setFlashdata('success', 'Thank you! Your message has been sent successfully. 💌');
            return redirect()->to('/contact');
        }

        return view('perfumes/contact');
    }

    public function viewMessages()
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Access denied. Admins only.');
        }

        $contactModel = new ContactModel();
        $messages = $contactModel->orderBy('created_at', 'DESC')->findAll();

        return view('perfumes/messages', ['messages' => $messages]);
    }

    public function deleteMessage($id)
    {
        if (session()->get('role') !== 'admin') {
            return redirect()->to('/')->with('error', 'Access denied. Admins only.');
        }

        $contactModel = new ContactModel();
        $contactModel->delete($id);

        return redirect()->to(site_url('contact/messages'))->with('success', 'Message deleted successfully!');
    }

    public function apiPage()
    {
        return view('perfumes/api_page');
    }

    public function getProducts()
    {
        $products = $this->model->findAll();
        return $this->response->setJSON($products);
    }

    public function explore()
    {
        $query = $this->request->getGet('q') ?? 'chanel';

        $client = \Config\Services::curlrequest();
        $data = [];

        try {
            $response = $client->request('GET', 'https://fragrancefinder-api.p.rapidapi.com/perfumes/search?q=' . urlencode($query), [
                'headers' => [
                    'X-RapidAPI-Host' => 'fragrancefinder-api.p.rapidapi.com',
                    'X-RapidAPI-Key'  => '9c347e0f9amsh119199f7f8da32dp1b01dcjsn7a66c7975130'
                ]
            ]);

            $data = json_decode($response->getBody(), true);

        } catch (\Exception $e) {
            // echo 'API Error: ' . $e->getMessage();
        }

        return view('perfumes/explore', [
            'results' => $data,
            'query'   => $query
        ]);
    }
}
