<?php

namespace App\Controllers\User\ForgotPass;

use App\Kernel\Controller\Controller;
use App\Services\UserService;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class StoreForgotPassController extends Controller
{
    public function store(){
        $toEmail = htmlspecialchars(trim($this->request()->input("email")));
        $service = new UserService($this->db());
        $validate = $this->request()->validate([
            "email" => "required|email|max:100"
        ]);
        if (!$validate) {
            $errors = $this->request()->errors();
            foreach ($errors as $field => $error) {
                $this->session()->set($field, $error);
            }

            $this->redirect("/forgot-password");
        }

        $token = bin2hex(random_bytes(16));
        $tokenHash = hash("sha256", $token);
        $expiry = date("Y-m-d H:i:s", time() + 60 * 30);

        $update =  $service->updateData(
            [
                "reset_token_hash" => $tokenHash,
                "reset_token_expires_at" => $expiry
            ],
            [
                "email" => $toEmail
            ]
        );

        if ($update){
            $this->sendEmail($token, $toEmail);
        }
        $this->session()->set("sent-success", "Byl odeslán odkaz pro obnovení hesla ");
        $this->redirect("/forgot-password");
    }

    public function sendEmail(string $token, string $toEmail){
        $config = $this->config();
        $host = $config->get("mailsettings.host");
        $smtpUsername = $config->get("mailsettings.username");
        $smtpPassword = $config->get("mailsettings.password");
        $smtpPort = $config->get("mailsettings.port");
        $charset = $config->get("mailsettings.charset");

        $email_subject = "Zapomenout helo";
        // Оформлення тіла листа у форматі HTML
        $email_body = "
        <html>
        <head>
            <style>
                body { font-family: Arial, sans-serif; color: #333; }
                .content { background-color: #f9f9f9; padding: 20px; border-radius: 8px; }
                h1 { color: #1043cb; }
                p { margin: 10px 0; }
                .footer { font-size: 12px; color: #777; text-align: center; }
            </style>
        </head>
        <body>
            <div class='content'>
               <h1>Zapomenuté heslo Email</h1>
                <span>Vážený uživateli,
                
                Obdrželi jste tento email, protože jste požádali o obnovení hesla k vašemu účtu v internetovém obchodě . Pokud jste žádost o obnovení hesla nepodali, ignorujte tento email.
              
                Pro obnovení vašeho hesla, prosím, klikněte na odkaz níže:</span>
                <a href='https://bikoo-shop/reset-password?token={$token}'>Obnovit heslo</a>
                
                <p>
                    Pokud odkaz nefunguje, zkopírujte jej a vložte do adresního řádku vašeho webového prohlížeče.
                </p>
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
            $mail->setFrom($smtpUsername, 'Bikoo');


            $mail->addAddress($toEmail);
//            $mail->SMTPOptions = array(
//                'ssl' => array(
//                    'verify_peer' => false,
//                    'verify_peer_name' => false,
//                    'allow_self_signed' => true
//                )
//            );

            $mail->Subject = $email_subject;
            $mail->Body    = $email_body;
            $mail->isHTML(true);

            $mail->SMTPDebug = 0;

            $send = $mail->send();


            if ($send) {
                $this->session()->set("mailSuccess", "Zpráva byla úspěšně odeslána!");
            } else {
                $this->session()->set("mailError", "Chyba při odesílání zprávy.");
            }
        } catch (Exception $e) {
            echo "error", "Při odesílání zprávy došlo k chybě: {$mail->ErrorInfo}";
        }
    }
}