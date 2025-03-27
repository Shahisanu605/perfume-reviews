<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Redirect to the perfume list page
        return view('welcome_message');
    }
}
