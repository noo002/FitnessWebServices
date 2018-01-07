<?php
    require_once '../Connection.php';
    $id = $_POST['id'];
    $rate = $_POST['rate'];
    $type = $_POST['type'];
    
    if($type==0) {
        $call =$con->prepare('CALL addGoalWeight(?,?)');
    }
    else if($type==1) {
        $call =$con->prepare('CALL addGoalStep(?,?)');
    }
    else if($type==2) {
        $call =$con->prepare('CALL addGoalBurn(?,?)');
    }
    $call->bind_param('ii',$id,$rate);
    if(!$call->execute()) echo 'error';
    
    $con->close();
?>

