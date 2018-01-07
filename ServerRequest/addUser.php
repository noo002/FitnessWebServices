<?php
    require_once '../Connection.php';
    
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $image = $_POST['image'];
    $height = 0;
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    
    /*
        $subject = "TARUC Fitness Companion Account Activation";
        $message = "
        <html>
        <head>
        <title>TARUC Fitness Companion Account Activation</title>
        </head>
        <body>
        <h1>Hello $name</h1>

        <p>We just need you to confrim your email address to complete your account</p>
        <a href='http://localhost/FitnessCompanion/activation.php?email=$email'>Verify You Email</a>

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
    */
    
  
    $query = $con->prepare("call addUser(?,?,?,?,?,?,?)");
    $query->bind_param('sississ',$name,$gender,$dob,$image,$height,$email,$pass);
    if(!$query->execute()) 
        echo $query->error;
    else{
        //mail($email,$subject,$message,$headers);
        $con->close();
    }
 ?>

