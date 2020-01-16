<?php


namespace app\http;

class SiteController
{
    public function index()
    {
        var_dump(1);
        die();

        return $this->render('site/index', compact([]));
    }
}