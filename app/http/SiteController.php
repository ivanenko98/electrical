<?php


namespace app\http;

use app\models\Request;

class SiteController extends Controller
{
    public function index()
    {
        return $this->render('site/index', compact([]));
    }

    public function createRequest()
    {
        try {
            Request::create([
                'name' => $_POST['name'],
                'email' => $_POST['email'],
                'phone' => $_POST['phone'],
                'subject' => $_POST['subject'],
                'message' => $_POST['message'],
            ]);

            $_SESSION['status'] = 'success';
        } catch (\Exception $e) {
            $_SESSION['status'] = 'error';
        }

        header('Location: http://'.$_SERVER['HTTP_HOST']);
    }
}