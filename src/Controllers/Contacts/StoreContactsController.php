<?php

namespace App\Controllers\Contacts;

use App\Kernel\Controller\Controller;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class StoreContactsController extends Controller
{
    public function store() : void
    {
        // Отримуємо дані з форми
        $name = htmlspecialchars(trim($this->request()->input("name")));
        $surname = htmlspecialchars(trim($this->request()->input("surname")));
        $fromEmail = htmlspecialchars(trim($this->request()->input("email")));
        $subject = htmlspecialchars(trim($this->request()->input("subject")));
        $message = htmlspecialchars(trim($this->request()->input("message")));

        // Дані для відправки на основі конфігурації
        $config = $this->config();
        $host = $config->get("mailsettings.host");
        $smtpUsername = $config->get("mailsettings.username");
        $smtpPassword = $config->get("mailsettings.password");
        $smtpPort = $config->get("mailsettings.port");
        $charset = $config->get("mailsettings.charset");

        $email_subject = "Nový dotaz: $subject";

        // Оформлення тіла листа у форматі HTML
        $email_body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; color: #333; }
                .content { background-color: #f9f9f9; padding: 20px; border-radius: 8px; }
                h2 { color: #4CAF50; }
                p { margin: 10px 0; }
                .footer { font-size: 12px; color: #777; text-align: center; }
            </style>
        </head>
        <body>
            <div class='content'>
                <h2>Nová zpráva od zákazníka</h2>
                <p><strong>Jméno:</strong> $name $surname</p>
                <p><strong>Email:</strong> $fromEmail</p>
                <p><strong>Předmět:</strong> $subject</p>
                <p><strong>Zpráva:</strong></p>
                <p>$message</p>
            </div>
            <div class='footer'>
                <p>Tato zpráva byla odeslána automaticky z vašeho webu.</p>
            </div>
        </body>
        </html>";

        $mail = new PHPMailer(true);

        try {
            $mail->isSMTP();
            $mail->Host = $host;
            $mail->SMTPAuth = true;
            $mail->Username = $smtpUsername;
            $mail->Password = $smtpPassword;
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = $smtpPort;

            $mail->CharSet = $charset;
            $mail->setFrom($smtpUsername, $name);

            $mail->addAddress($smtpUsername);


            $mail->SMTPOptions = array(
                'ssl' => array(
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                    'allow_self_signed' => true
                )
            );

            $mail->Subject = $email_subject;
            $mail->Body    = $email_body;
            $mail->isHTML(true);



            $sended = $mail->send();
            $mail->SMTPDebug = 2;

            if ($sended) {
                $this->session()->set("mailSuccess", "Zpráva byla úspěšně odeslána!");
            } else {
                $this->session()->set("mailError", "Chyba při odesílání zprávy.");
            }

            $this->redirect("/contacts");
        } catch (Exception $e) {
            echo "error", "Při odesílání zprávy došlo k chybě: {$mail->ErrorInfo}";
        }
    }
}
