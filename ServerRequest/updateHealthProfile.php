<?php
    require_once '../Connection.php';
    
    $id = $_POST['id'];
    $type = $_POST['type'];
    $rate = $_POST['rate'];
    
    $call =$con->prepare('CALL updateHealthProfile(?,?,?)');
    $call->bind_param('iii',$id,$type,$rate);
    if(!$call->execute()) echo 'error';
    
    $con->close();
?>

