<div class="modal" id="newTrainerModal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">New Trainer</h4>
            </div>
            <div class="modal-body">
                <form action="<?php  echo $_SERVER['PHP_SELF']?>" method="post">
                <div class="form-group">
                    <label for="name"></span> Name</label>
                    <input type="text" maxlength="255" class="form-control" name="newName" placeholder="Enter name" required pattern="[A-Za-z ]{3,255}" title="Not allow special symbol & number"/>
                </div>
                <div class="form-group">
                    <label for="gender"></span> Gender</label><br/>
                    <label><input type="radio" value="0" name="newGender" required/>Male</label>&nbsp;&nbsp;
                    <label><input type="radio" value="1" name="newGender"/>Female</label>
                </div> 
                <div class="form-group">
                    <label for="email"></span> Email</label>
                    <input type="email" maxlength="255" id="newEmail" name="newEmail" class="form-control" oninvalid="checkEmail(this);" oninput="checkEmail(this);" placeholder="Enter email" required />
                </div>
                <div class="form-group">
                    <label for="cert"></span> Certificate</label>
                    <input type="text" maxlength="255" class="form-control" name="newCert" placeholder="Enter certificate" />
                </div>
                <div class="form-group">
                    <label for="year"></span> Year of experience</label>
                    <input type="number" min="0" maxlength="255" class="form-control" name="newYear" placeholder="Enter year" required  title="Not allow negative number"/>
                </div>
                    <div class="alert alert-info">
                        <strong>
                            <ul>
                                <li>Password will send through the email.</li>
                                <li>Email cannot change after insert.</li>
                            </ul>
                        </strong>
                    </div>
                <button type="submit" name="new" class="btn btn-success btn-block"><span class="glyphicon glyphicon-plus"></span> Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
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

    if(isset($_POST['new'])) {
        $name=$_POST['newName'];
        $email=$_POST['newEmail'];
        $gender=$_POST['newGender'];
        $cert=$_POST['newCert'];
        $year=$_POST['newYear'];
        $pass=randomString();
        $query = $con->prepare("INSERT INTO trainer (name,gender,email,password,certificate,experience,active) VALUES(?,?,?,?,?,?,1)");
        $query->bind_param('sisssi',$name,$gender,$email,$pass,$cert,$year);
        if(!$query->execute()) echo $query->error;
        echo "<meta http-equiv='refresh' content='0'>";
        echo "<script type='text/javascript'>alert('New trainer added');</script>";
            
            $con->close();
            
            $subject = "TARUC Fitness Companion";
            $message = "
            <html>
            <head>
            <title>TARUC Fitness Companion</title>
            </head>
            <body>

            <h1>Hello, $name</h1>
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
    }
?>