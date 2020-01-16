<?php


namespace app\http;


class SiteController
{
    public function index()
    {

        return $this->render('site/index');
    }
}