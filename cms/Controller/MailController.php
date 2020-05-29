<?php
/**
 * Created by PhpStorm.
 * User: AeroCool
 * Date: 09.08.2018
 * Time: 18:59
 */

namespace Cms\Controller;

use Engine\Controller;

class MailController extends CmsController
{
    public function send() {

        $this->load->model('Mail');

        $params = $this->request->post;

        if (isset($params['phone'])) {
            $mail = $this->model->mail->sendMail($params);
            echo $mail;
        }
    }
}