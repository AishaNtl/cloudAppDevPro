<?php

namespace App\Controllers;

use App\Models\UserModel;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\API\ResponseTrait;

class LoginController extends BaseController
{
    use ResponseTrait;

    /**
     * Display the login form.
     */
    public function index()
    {
        return view('login/index');
    }

    /**
     * Handle the login process.
     *
     * @return ResponseInterface
     */
    public function authenticate()
    {
        $session = session();
        $model = new UserModel();

        // Retrieve input
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Find user by email
        $user = $model->where('Email', $email)->first();

        if ($user) {
            // Verify password
            if (password_verify($password, $user['PasswordHash'])) {
                // Set session data
                $session->set([
                    'user_id' => $user['UserID'],
                    'user_name' => $user['FirstName'],
                    'role' => $user['Role'],
                    'is_logged_in' => true,
                ]);

                return redirect()->to('/home')->with('loginMsg', 'Login Successfully');

            } else {

                return redirect()->to('/login')->with('loginMsg', 'Invalid Password');
            }
        } else {

            return redirect()->to('/login')->with('loginMsg', 'Invalid Login');
        }
    }

    /**
     * Handle the logout process.
     *
     * @return ResponseInterface
     */
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/login');
    }
}
