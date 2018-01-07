<?php
    require_once '../Connection.php';
    
    $id = $_POST["id"];
    $name = $_POST["name"];
    
    $call =$con->prepare('CALL updateName(?,?)');
    $call->bind_param('is',$id,$name);
    $call->execute();
    
    $con->close();
    
    
?>