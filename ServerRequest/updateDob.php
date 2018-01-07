<?php
    require_once '../Connection.php';
    
    $id = $_POST["id"];
    $dob = $_POST["dob"];
    
    $call =$con->prepare('CALL 	updateDob(?,?)');
    $call->bind_param('is',$id,$dob);
    $call->execute();
    
    $con->close();
    
    
?>