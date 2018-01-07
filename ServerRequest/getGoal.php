<?php

    require_once '../Connection.php';
    $id =7;
    $call =$con->prepare('CALL addDiet(?,?,?,?)');
    $call->bind_param('iiii',$no,$qty,$type,$id);
    $call->execute();
    $con->close();
?>

