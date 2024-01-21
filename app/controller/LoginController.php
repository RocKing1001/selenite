<?php

namespace controller;

class LoginController extends Controller
{
    private \service\UserService $service;

    public function __construct()
    {
        parent::__construct();

        $this->service = new \service\UserService();

        if ($_POST != null) {
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $password = filter_var($_POST['password']);

            $user = $this->service->hashPassAndLogin($email, $password);

            if (! $user) {
                echo "<script>alert('invalid username/password provided')</script>";
                @$this->render();
            } else {
                session_start(); // start a session
                $_SESSION['username'] = $user->username;
                $_SESSION['uid'] = $user->user_id;
                header('Location: /profile');
            }

        } else {
            $this->render();
        }
    }
}
