<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Admin extends Controller
{
    public function dashboard()
    {
        // echo view('admin/dashboard');
        $username = session()->get('username');
        return view('admin/dashboard', ['username' => $username]);
    }
}
