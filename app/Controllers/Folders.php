<?php 

namespace App\Controllers;

use App\Models\FolderModel;
use App\Models\UserModel;
use CodeIgniter\Controller;

class Folders extends Controller
{
    public function index()
    {
        $session = \Config\Services::session();

        // Check if the user is authenticated
        if (!$session->get('isLoggedIn')) {
            return redirect()->to('auth/login');
        }

        $model = new FolderModel();
        $data['folders'] = $model->findAll();
        echo view('admin/folders', $data);
    }

    public function create()
    {
        echo view('admin/folder_form');
    }

    // public function store()
    // {
    //     $model = new FolderModel();
    //     $data = [
    //         'user_id' => $this->request->getPost('user_id'),
    //         'name' => $this->request->getPost('name')
    //     ];
    //     $model->save($data);
    //     return redirect()->to('/folders');
    // }
    public function store()
{
    $userModel = new UserModel();
    $folderModel = new FolderModel();

    $userId = $this->request->getPost('user_id');
    $folderName = $this->request->getPost('name');

    // Check if the user exists
    $user = $userModel->find($userId);

    if ($user) {
        // Define the folder path relative to the public/uploads directory in filemsystem_ci4
        $folderPath = FCPATH . '../filemsystem_ci4/public/uploads/' . $userId . '/' . $folderName;

        // Create the folder
        if (!is_dir($folderPath)) {
            mkdir($folderPath, 0777, true);
        } else {
            return redirect()->back()->with('error', 'Folder already exists.');
        }

        // Save folder info to database
        $data = [
            'user_id' => $userId,
            'name'    => $folderName
        ];
        $folderModel->save($data);

        return redirect()->to(base_url('/folders'));
    } else {
        // User does not exist, set an error message
        return redirect()->back()->with('error', 'User does not exist.')->withInput();
    }
}

    public function edit($id)
    {
        $model = new FolderModel();
        $data['folder'] = $model->find($id);
        echo view('admin/folder_form', $data);
    }

    public function update($id)
    {
        $model = new FolderModel();
        $data = [
            'user_id' => $this->request->getPost('user_id'),
            'name' => $this->request->getPost('name')
        ];
        $model->update($id, $data);
        return redirect()->to('/folders');
    }

    public function delete($id)
{
    $fileModel = new \App\Models\FileModel();
    $folderModel = new \App\Models\FolderModel();
    
    // First delete all files associated with the folder
    $fileModel->where('folder_id', $id)->delete();
    
    // Now delete the folder
    $folderModel->delete($id);
    
    return redirect()->to('/folders');
}

}
