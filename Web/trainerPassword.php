<div class="modal" id="trainerPasswordModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Management Password Recovery</h4>
            </div>
            <div class="modal-body">
                <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">
                <div class="form-group">
                <label for="email"><span class="glyphicon glyphicon-envelope"></span> Email</label>
                <input type="email" maxlength="255" class="form-control" name="trainerEmailPass" id="managementEmailPass" oninvalid="checkEmailT(this);" oninput="checkEmailT(this);" placeholder="Enter email" required/>
            </div>
            <button type="submit"  name="trainerForget"  class="btn btn-success btn-block"><span class="glyphicon glyphicon-refresh"></span> Recovery</button>
            </form>
            </div>
        </div>
    </div>
</div>
<?php
   
    if(isset($_POST['trainerForget'])) {
        require_once('../Connection.php');
        $email = $_POST['trainerEmailPass'];
        $pass =randomString();
        $query = $con->prepare("UPDATE trainer SET password =?  WHERE email =?");
        $query->bind_param('ss',$pass,$email);
        if(!$query->execute()) echo $query->error;
        
        $con->close();
        $subject = "TARUC Fitness Companion";
            $message = "
            <html>
            <head>
            <title>TARUC Fitness Companion</title>
            </head>
            <body>

            <h1>Hello,</h1>
            <br/>
            <p>Welcome to join us!</p>
            <p>Your password : $pass</p>
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
            echo "<script type='text/javascript'>alert('Please Check the email for new password sent throught the email already');</script>";
            echo "<meta http-equiv='refresh' content='0'>";
    }
    
?>