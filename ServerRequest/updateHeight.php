<?php
    require_once '../Connection.php';
    
    $id = $_POST["id"];
    $height = $_POST["height"];
    
    $call =$con->prepare('CALL updateHeight(?,?)');
    $call->bind_param('ii',$id,$height);
    $call->execute();
    
    $con->close();
    
    
?>