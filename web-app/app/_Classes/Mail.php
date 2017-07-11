<?php
namespace App\_Classes;

use PHPMailer;

class Mail
{

    protected $mail;

    public function __construct(PHPMailer $mail)
    {
        $this->mail = $mail;
        $this->mail->isSMTP();
        $this->mail->setFrom($GLOBALS['smtp_from_email'], 'Excel file converter');
        $this->mail->Host = $GLOBALS['smtp_host'];
        $this->mail->SMTPAuth = $GLOBALS['smtp_auth'];
        $this->mail->Username = $GLOBALS['smtp_username'];
        $this->mail->Password = $GLOBALS['smtp_password'];
        $this->mail->SMTPSecure = $GLOBALS['smtp_secure'];
        $this->mail->Port = $GLOBALS['smtp_port'];
    }

    public function send($to, $subject, $body, $attachment)
    {
        $this->mail->addAddress($to);
        $this->mail->addAttachment($attachment);
        $this->mail->isHTML(true);
        $this->mail->Subject = $subject;
        $this->mail->Body = $body;

        if (!$this->mail->send()) {
            echo "Mailer error: " . $this->mail->ErrorInfo;
            exit;
        }

    }

}