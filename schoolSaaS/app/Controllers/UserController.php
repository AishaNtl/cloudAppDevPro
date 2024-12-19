<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;

class UserController extends BaseController
{
    use ResponseTrait;

    /**
     * Display all users.
     */
    public function index()
    {
        $model = new UserModel();
        $data['users'] = $model->findAll();
        return view('users/index', $data);
    }

    /**
     * Show the form to create a new user.
     */
    public function new()
    {
        return view('users/create');
    }

    /**
     * Create a new user.
     */
    public function create()
    {
        $model = new UserModel();

        // Get form data
        $data = $this->request->getPost();

        // Validate the input data
        if (!$this->validate([
            'FirstName' => 'required|max_length[255]',
            'LastName'  => 'required|max_length[255]',
            'Email'      => 'required|valid_email|is_unique[users.email]',
            'PasswordHash' => 'required|min_length[8]',
            'Role' => 'required|in_list[Admin,Teacher,Student,Parent]'
        ])) {
            // If validation fails, return with errors
            return redirect()->to('/users/new')->withInput()->with('errors', $this->validator->getErrors());
        }

        // Hash the password before saving it
        $data['PasswordHash'] = password_hash($data['PasswordHash'], PASSWORD_BCRYPT);

        // Save the user data
        $model->save($data);

        return redirect()->to('/users');
    }

    /**
     * Show the form to edit an existing user.
     */
    public function edit($id)
    {
        $model = new UserModel();
        $data['user'] = $model->find($id);

        if (empty($data['user'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('User not found');
        }

        return view('users/edit', $data);
    }

    /**
     * Update an existing user.
     */
    public function update($id)
    {
        $model = new UserModel();

        // Get form data
        $data = $this->request->getPost();

        // Validate the input data
        if (!$this->validate([
            'FirstName' => 'required|max_length[255]',
            'LastName'  => 'required|max_length[255]',
            'Email'      => 'required|valid_email',
            'Role'       => 'required|in_list[Admin,Teacher,Student,Parent]'
        ])) {
            // If validation fails, return with errors
            return redirect()->to("/users/edit/{$id}")->withInput()->with('errors', $this->validator->getErrors());
        }

        // If password is set, hash it
        if (!empty($data['PasswordHash'])) {
            $data['PasswordHash'] = PasswordHash($data['PasswordHash'], PASSWORD_BCRYPT);
        } else {
            // If no new password, remove the PasswordHash field from the update
            unset($data['PasswordHash']);
        }

        // Update timestamps
        $data['updated_at'] = date('Y-m-d H:i:s');

        // Update the user data
        $model->update($id, $data);

        return redirect()->to('/users');
    }

    /**
     * Delete a user.
     */
    public function delete($id)
    {
        $model = new UserModel();
        $model->delete($id);
        return redirect()->to('/users');
    }
}
