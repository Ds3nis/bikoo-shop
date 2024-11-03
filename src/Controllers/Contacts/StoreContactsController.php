<?php

namespace App\Controllers\Contacts;

use App\Kernel\Controller\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'path/to/PHPMailer/src/Exception.php';
require 'path/to/PHPMailer/src/PHPMailer.php';
require 'path/to/PHPMailer/src/SMTP.php';
class StoreContactsController extends Controller
{
    public function store(){

        $name = htmlspecialchars(trim($this->request()->input("name")));
        $surname = htmlspecialchars(trim($this->request()->input("surname")));
        $subject = htmlspecialchars(trim($this->request()->input("subject")));
        $message = htmlspecialchars(trim($this->request()->input("message")));


        $to = "dhuda566@gmail.com";


        $email_subject = "Новий запит: $subject";


        $email_body = "Ім'я: $name $surname\n";
        $email_body .= "Тема: $subject\n";
        $email_body .= "Повідомлення:\n$message\n";


        $mail = new PHPMailer(true);

        try {
            // Налаштування SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'your_email@gmail.com';
            $mail->Password = '';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = 587;


            $mail->setFrom('your_email@gmail.com', 'Your Name');
            $mail->addAddress('dhuda566@gmail.com');


            $mail->Subject = $email_subject;
            $mail->Body    = $email_body;

            // Відправка повідомлення
            $mail->send();
            echo 'Повідомлення успішно відправлено!';
        } catch (Exception $e) {
            echo "Виникла помилка при відправленні повідомлення: {$mail->ErrorInfo}";
        }
    }
}