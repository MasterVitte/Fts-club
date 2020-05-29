<?php

namespace Cms\Controller;

class HomeController extends CmsController
{
    public function index()
    {
        $this->view->render('index');
    }

    public function privacy()
    {
      $this->view->render('privacy');
    }

    public function video()
    {
      $this->view->render('video');
    }
}