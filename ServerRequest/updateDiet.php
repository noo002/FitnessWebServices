<?php
    require_once '../Connection.php';
    
    $qty = $_POST['qty'];
    $type=$_POST['type'];
    $no =$_POST['no'];
    
    $call =$con->prepare('CALL 	updateDiet(?,?,?)');
    $call->bind_param('iii',$qty,$type,$no);
    $call->execute();
    
    $con->close();
?>

