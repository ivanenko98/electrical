<?php


namespace app\http;

class AdminController extends Controller
{
    public function dashboard()
    {
        $this->isAdmin();

        return $this->render('admin/dashboard', compact([]));
    }

    protected function isAdmin()
    {
        if (!$_SESSION["auth"]) {
            header('Location: http://'.$_SERVER['HTTP_HOST'].'/auth/login');
        }
    }
}