<?php
    require_once '../Connection.php';
    
    $id = $_POST["id"];
    $pass = $_POST["pass"];
    
    $call =$con->prepare('CALL updatePassword(?,?)');
    $call->bind_param('is',$id,$pass);
    $call->execute();
    
    $con->close();
    
    
?>