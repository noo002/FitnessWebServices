<?php
    require_once 'Connection.php';
    
    $email = $_GET['email'];
    
    //using procedure
    
    $query = $con->prepare("call fetchActive(?,@active)");
    $query->bind_param('s',$email);
    if(!$query->execute()) echo $query->error;
    $result = $con->query("SELECT @active")->fetch_assoc();
    $active = $result["@active"];
   
    //no use procedure
    /*
    $query = $con->prepare("SELECT active FROM user WHERE email= ?");
    $query->bind_param('s',$email);
    if(!$query->execute()) echo $query->error;
    $result = $query->get_result()->fetch_assoc();
    $active = $result['active'];
    */
    if($active<>NULL) {
        if($active==1) {
            echo '<h1>You are already activated your account</h1>';
        }
        else if($active==-1) {
            $query = $con->prepare("call updateActive(?)");
            $query->bind_param('s',$email);
            if(!$query->execute()) 
                echo $query->error;
            else
                echo '<h1>You are activated your account<br/>Enjoy our service</h1>';
        }
    }
    else
        echo '<h1>Sorry, This Email is not yet register yet</h1>';
    
    
    $con->close();
    
?>

