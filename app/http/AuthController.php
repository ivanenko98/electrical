<?php


namespace app\http;

use app\models\User;

class AuthController extends Controller
{
    public function login()
    {
        if (
            isset($_POST['email']) && strlen($_POST['email']) > 0 &&
            isset($_POST['password']) && strlen($_POST['password']) > 0
        ) {
            if (User::checkCredentials($_POST['email'], $_POST['password'])) {
                $_SESSION["auth"] = true;
                header('Location: http://'.$_SERVER['HTTP_HOST'].'/admin/dashboard');
            } else {
                $_SESSION['status'] = 'error';
                header('Location: http://'.$_SERVER['HTTP_HOST'].'/auth/login');
            }
        } else {
            if ($_SESSION["auth"]) {
                header('Location: http://'.$_SERVER['HTTP_HOST'].'/admin/dashboard');
            } else {
                return $this->render('auth/login', compact([]));
            }
        }
    }

    public function logout()
    {
        $_SESSION["auth"] = false;

        header('Location: http://'.$_SERVER['HTTP_HOST']);
    }
}