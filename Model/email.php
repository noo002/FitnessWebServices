<?php

require_once 'smtp/PHPMailer.php';
require_once 'smtp/Exception.php';
require_once 'smtp/SMTP.php';

//require_once '../Control/CommonFunction.php';

class email {

    private $host, $username, $password, $from, $to, $subject, $body;

    //username and from are the same,username is the email and password is the gmail of you.
    //from is from which email you want to send therefore, same email .

    function __construct($host, $username, $password, $from, $to, $subject, $body) {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->from = $from;
        $this->to = $to;
        $this->subject = $subject;
        $this->body = $body;
    }

    private function checkEmailFormat() {
        $result = false;
        if (filter_var($this->to, FILTER_VALIDATE_EMAIL)) {
            $result = true;
        }
        return $result;
    }

    public function sendEmail() {
        $result = false;
        if ($this->checkEmailFormat() == true) {
            $smtp = new PHPMailer\PHPMailer\PHPMailer();
            $smtp->isSMTP();
            $smtp->SMTPDebug = 1;
            $smtp->SMTPAuth = true;
            $smtp->SMTPSecure = 'ssl';
            $smtp->Host = "smtp.gmail.com";
            $smtp->Port = 465;
            $smtp->Username = $this->username;
            $smtp->Password = $this->password;
            $smtp->setFrom($this->username);
            $smtp->Subject = $this->subject;
            $smtp->Body = $this->body;
            $smtp->addAddress($this->to);
            //       $path = "../View/Web/home.php";
            if (!$smtp->send()) {
                $message = 'Mailer Error: ' . $smtp->ErrorInfo;
            } else {
                $result = true;
            }
        }
        return $result;
    }

}
