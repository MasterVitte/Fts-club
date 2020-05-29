<?php

namespace Admin\Controller;

class ErrorController extends AdminController
{
    public function page404()
    {
        // Render this template
        $this->view->render('404');
    }
}