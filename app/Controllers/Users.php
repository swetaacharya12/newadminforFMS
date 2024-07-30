<?php 

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\Controller;

class Users extends Controller
{

    public function index()
    {
        
        $session = \Config\Services::session();

        // Check if the user is authenticated
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('auth/login');
        }
        $model = new UserModel();
        $data['users'] = $model->findAll();
        echo view('admin/users', $data);
    }



    public function create()
    {
        echo view('admin/user_form');
    }

    public function store()
    {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'password' => password_hash('$password', PASSWORD_DEFAULT),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role')
        ];
        $model->save($data);
        return redirect()->to('/users');
    }

    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);
        echo view('admin/user_form', $data);
    }

    public function update($id)
    {
        $model = new UserModel();
        $data = [
            'username' => $this->request->getPost('username'),
            'email' => $this->request->getPost('email'),
            'role' => $this->request->getPost('role')
        ];
        if ($this->request->getPost('password')) {
            $data['password'] = password_hash('$password', PASSWORD_DEFAULT);
            // $data['password'] = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        }
        $model->update($id, $data);
        return redirect()->to('/users');
    }

    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/users');
    }

    public function profile()
    {
        $session = session();
        $model = new UserModel();
        $data['user'] = $model->find($session->get('id'));
        echo view('admin/profile', $data);
    }
}
