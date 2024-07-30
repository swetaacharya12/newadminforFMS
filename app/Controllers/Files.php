<?php

namespace App\Controllers;

use App\Models\FileModel;
use CodeIgniter\Controller;

class Files extends Controller
{
    public function index()
    {
        $session = \Config\Services::session();

        // Check if the user is authenticated
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('auth/login');
        }
        $model = new FileModel();
        $data['files'] = $model->findAll();
        echo view('admin/files', $data);
    }

    public function create()
    {
        echo view('admin/file_form');
    }

    public function store()
    {
        $model = new FileModel();
        $data = [
            'folder_id' => $this->request->getPost('folder_id'),
            'name' => $this->request->getPost('name'),
            'path' => $this->request->getPost('path')
        ];
        $model->save($data);
        return redirect()->to('/files');
    }

    public function edit($id)
    {
        $model = new FileModel();
        $data['file'] = $model->find($id);
        echo view('admin/file_form', $data);
    }

    public function update($id)
    {
        $model = new FileModel();
        $data = [
            'folder_id' => $this->request->getPost('folder_id'),
            'name' => $this->request->getPost('name'),
            'path' => $this->request->getPost('path')
        ];
        $model->update($id, $data);
        return redirect()->to('/files');
    }

    public function delete($id)
    {
        $model = new FileModel();
        $model->delete($id);
        return redirect()->to('/files');
    }
}
