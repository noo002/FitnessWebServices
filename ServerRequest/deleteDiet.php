<?php
    require_once '../Connection.php';
    
    $no = $_POST['no'];
    
    $call =$con->prepare('CALL deleteDiet(?)');
    $call->bind_param('i',$no);
    $call->execute();
    
    $con->close();
?>

