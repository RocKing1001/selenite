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
            $this->destroy_session();
        } elseif (@$_POST['delete'] != null) {
            $uid = $_SESSION['uid'];
            $password = filter_var($_POST['old']);

            var_dump($password);
            try {
                if (! $this->service->deleteUser($uid, $password)) {
                    echo "<script>alert('User deletion failed! Invalid password.')</script>";
                } else {
                    $this->destroy_session();
                    echo '<script>window.location.href = "/login";</script>';
                }
            } catch (\Exception $e) {
                echo "<script>alert('User deletion failed!')</script>";
                //throw new \error\InternalServer();
            }

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

    private function destroy_session(): void
    {

        $_SESSION['username'] = null;
        session_destroy();
        echo '<script>window.location.href = "/login";</script>';
    }
}
