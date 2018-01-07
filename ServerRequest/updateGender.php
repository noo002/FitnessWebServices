<?php
    require_once '../Connection.php';
    
    $id = $_POST["id"];
    $gender = $_POST["gender"];
    
    $call =$con->prepare('CALL updateGender(?,?)');
    $call->bind_param('ii',$id,$gender);
    $call->execute();
    
    $con->close();
    
    
?>