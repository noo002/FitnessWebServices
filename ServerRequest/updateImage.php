<?php
    require_once '../Connection.php';
    
    $id = $_POST["id"];
    $image = $_POST["image"];
    
    $call =$con->prepare('CALL 	updateImage(?,?)');
    $call->bind_param('is',$id,$image);
    $call->execute();
    
    $con->close();
    
    
?>