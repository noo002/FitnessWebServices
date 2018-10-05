<?php

    require_once '../Connection.php';
    
    $id = $_POST["id"];
    $step = $_POST["step"];
    
    $call =$con->prepare('CALL updateStep(?,?)');
    $call->bind_param('ii',$id,$step);
    $call->execute();
    
    $con->close();

?>
