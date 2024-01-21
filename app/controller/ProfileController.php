<?php

namespace controller;

class ProfileController extends Controller
{
    private \service\UserService $service;

    public function __construct()
    {
        parent::__construct();
        $this->service = new \service\UserService();

        $this->render();
        if (@$_GET['logout'] == true) {
            $_SESSION['username'] = null;
            session_destroy();
            echo '<script>window.location.href = "/login";</script>';
        } elseif (@$_POST != null) {
            $uid = $_SESSION['uid'];

            if (@$_POST['username'] != null) {
                $username = filter_var($_POST['username']);

                $uid = $_SESSION['uid'];
                try {
                    $this->service->updateUsername($uid, $username);
                    $_SESSION['username'] = $username;
                    echo '<script>window.location.href = "/profile";</script>';
                } catch (\Exception $e) {
                    // we dont want the user to get any sensitive info via the error message
                    throw new \error\InternalServer();
                }
            }

            if (@$_POST['password'] != null && @$_POST['old'] != null) {
                $old = filter_var($_POST['old']);
                $password = filter_var($_POST['password']);
                try {
                    $this->service->updatePassword($uid, $old, $password);
                    echo '<script>window.location.href = "/profile";</script>';
                } catch (\Exception $e) {
                    // throw new \error\InternalServer(); not a server error, user error this time
                    echo "<script>alert('Password update failed')</script>";
                }
            }
        }
    }
}
