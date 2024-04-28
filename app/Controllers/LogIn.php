<?php

namespace App\Controllers;

use App\Models\Log_inModel;

class LogIn extends BaseController
{
    public function index()
    {
        $data['title'] = 'Log_in';

        echo view('auth/log_in');
    }

    public function ceklogin()
    {
        $model = new Log_inModel();

        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $user = $model->checkCredentials($username, $password);

        if ($user) {
            // Set session data
            $userData = [
                'id_user'   => $user['id_user'],
                'username'  => $user['username'],
                'role'      => $user['role'],
                'logged_in' => true,
            ];

            session()->set($userData);

            // Redirect based on user role
            if ($user['role'] == 'admin') {
                return redirect()->to(base_url('/dashboard'));
            } else {
                return redirect()->to(base_url('/dashboard'));
            }
        } else {
            // Incorrect credentials, handle accordingly (e.g., show an error message)
            echo "Invalid username or password";
        }
    }
}
    


