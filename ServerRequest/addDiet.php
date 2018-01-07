<?php

    require_once '../Connection.php';
    
    $no = $_POST['no'];
    $qty =$_POST['qty'];
    $type=$_POST['type'];
    $id=$_POST['id'];;
    
    $call =$con->prepare('CALL addDiet(?,?,?,?)');
    $call->bind_param('iiii',$no,$qty,$type,$id);
    $call->execute();
    
    $con->close();
?>

