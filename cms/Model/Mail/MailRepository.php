<?php
/**
 * Created by PhpStorm.
 * User: AeroCool
 * Date: 15.08.2018
 * Time: 12:26
 */

namespace Cms\Model\Mail;

use Engine\Model;
use Cms\Model\PHPMailer\PHPMailer;
use Cms\Model\PHPMailer\Exception;

class MailRepository extends Model
{
    public function sendMail($params) {

        $fio = 'Имя: ' .  $params['fio'];
        $phone = 'Телефон: ' .  $params['phone'];

        if (!empty($params['question'])) {
            $question = 'Комментарий: ' . $params['question'];
        } else {
            $question = '';
        }

        $body = "
        
        <table border='0' cellpadding='0' cellspacing='0' style='margin:0; padding:0'; width='600px'; height='600px';>
            <tr>
                <td style='background-color: #1a1a1a;'>
                    <center style='width: 100%;'>
                        <table border='0' cellpadding='0' cellspacing='0' style='margin:0; padding:0'; width='600px'>
                            <tr>
                                <td>
                                    <span style='display:inline-block; width:100%; text-align:center; padding:15px; color:red; font-weight:bold; letter-spacing:2px; font-size:30px'>
                                        ЗАЯВКА FTS-CLUB
                                    </span>
                                    <span style='display:inline-block; width:100%; text-align:center; padding:15px; color:#ffffff; font-size:20px'>
                                        {$fio}
                                    </span>
                                    <span style='display:inline-block; width:100%; text-align:center; padding:15px; color:#ffffff; font-size:20px'>
                                        {$phone}
                                    </span>
                                    <span style='display:inline-block; width:90%; margin-left:5%; text-align:center; padding:15px; color:#ffffff; font-size:20px'>
                                        {$question}
                                    </span>
                                </td>
                            </tr>
                        </table>
                    </center>   
                </td>
            </tr>
        </table>
        ";

        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = 2;                                 // Enable verbose debug output
            $mail->isSMTP();                                      // Set mailer to use SMTP
            $mail->Host = 'smtp.yandex.ru';  // Specify main and backup SMTP servers
            $mail->SMTPAuth = true;                               // Enable SMTP authentication
            $mail->Username = 'fts-club@yandex.ru';                 // SMTP username
            $mail->Password = 'p3!EjYWv';                           // SMTP password
            $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587;

            //Recipients
            $mail->setFrom('fts-club@yandex.ru', 'FTS');
            $mail->addAddress("info@fts-club.ru", 'FTS');  // получатель
            $mail->isHTML(true);

            //Content
            $mail->Subject = "Заявка FTS";
            $mail->Body    = $body;

            $mail->send();
        } catch (Exception $e) {
        }
    }
}