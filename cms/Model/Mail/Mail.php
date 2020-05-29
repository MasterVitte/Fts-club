<?php
/**
 * Created by PhpStorm.
 * User: AeroCool
 * Date: 15.08.2018
 * Time: 12:26
 */

namespace Cms\Model\Mail;

use Engine\Core\Database\ActiveRecord;

class Mail
{
    use ActiveRecord;

    public $fio;

    public $phone;

    public $question;

    /**
     * @return mixed
     */
    public function getFio()
    {
        return $this->fio;
    }

    /**
     * @param mixed $fio
     */
    public function setFio($fio)
    {
        $this->fio = $fio;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return mixed
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * @param mixed $question
     */
    public function setQuestion($question)
    {
        $this->question = $question;
    }

}