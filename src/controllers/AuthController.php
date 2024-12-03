<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Models\User;

class AuthController extends Controller
{
    public function __construct()
    {
        if ($this->isAuth()) {
            $this->redirect('/');
        }
    }

    public function getRegister()
    {
        $this->render('register');
    }

    public function getLogin()
    {
        $this->render('login');
    }

    public function getPage()
    {
        $this->render('page');
    }

    public function postRegister()
    {
        $firstName = $_POST['fname'];
        $lastName = $_POST['lname'];
        $email = $_POST['email'];
        $password = $_POST['pass'];

        $profilePath = strtolower($firstName) . '-' . strtolower($lastName) . '-' . uniqid();
        $imageUrl = 'img/profile.jpg';

        $user = User::create([
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'profile_path' => $profilePath,
            'image_url' => $imageUrl,
        ]);

        $this->render('success', ['user' => $user]);
    }

    public function postLogin()
    {
        $email = $_POST['email'];
        $password = $_POST['pass'];

        $user = User::where('email', $email)->first();
        if ($user && password_verify($password, $user->password)) {
            $_SESSION['user_id'] = $user->id;
            $this->redirect('/');
        } else {
            $this->render('login', ['email' => $email, 'error' => 'Wrong email or password']);
        }
    }

    public function logout()
    {
        session_destroy();
        $this->redirect('/login');
    }
}
