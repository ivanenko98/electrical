<?php


namespace app\http;

class SiteController extends Controller
{
    public function index()
    {
        return $this->render('site/index', compact([]));
    }
}