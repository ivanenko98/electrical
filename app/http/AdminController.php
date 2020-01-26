<?php


namespace app\http;

use app\models\Request;

class AdminController extends Controller
{
    public function dashboard()
    {
        $this->isAdmin();

        $requests = Request::find('ORDER BY id DESC');

        return $this->render('admin/dashboard', compact('requests'));
    }

    protected function isAdmin()
    {
        if (!$_SESSION["auth"]) {
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/auth/login');
        }
    }
}