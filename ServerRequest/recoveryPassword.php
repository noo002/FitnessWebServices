<?php
    require_once '../Connection.php';
    $newPass = randomString();
    $email = $_POST['email'];
    
    $query = $con->prepare("call resetPassword(?,?)");
    $query->bind_param('ss',$email,$newPass);
    if(!$query->execute()) 
        echo $query->error;
   
    $subject = "TARUC Fitness Companion Password Reset";
    $message = "
    <html>
    <head>
    <title>TARUC Fitness Companion Password Reset</title>
    </head>
    <body>

    <h1>Hello,</h1>
    <br/>
    <p>Your request for password reset for your account has been approved</p>
    <p>Your new password : $newPass</p>
    <br/>
    <p>Do note that passwords are case-sensitive. Please enter them as what is given to you. If you copy and paste your password, make sure you did not copy extra space in front or after the password.</p>
    <br/>
    <br/>
    <p>Thank you.</p>
    <br/>
    <p>This is a Computer Generated e-mail. Please do not reply to this e-mail address.</p>

    </body>
    </html>
    ";
    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    // More headers
    $headers .= 'From: <TARUC-Fitness-Companion>' . "\r\n";

    mail($email,$subject,$message,$headers);
    
    function randomString($length = 6) {
        $str = "";
        $characters = array_merge(range('A','Z'), range('a','z'), range('0','9'));
        $max = count($characters) - 1;
        for ($i = 0; $i < $length; $i++) {
                $rand = mt_rand(0, $max);
                $str .= $characters[$rand];
        }
    return $str;
    }
    
    $con->close();
    
?>