<?php
    require_once '../Connection.php';
    
    $id = $_POST['id'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $goalWeight = $_POST['goalw'];
    $goalStep = $_POST['goals'];
    $goalBrun = $_POST['goalb'];
    
    
    $call =$con->prepare('CALL updateHeight(?,?)');
    $call->bind_param('ii',$id,$height);
    if(!$call->execute()) echo 'error';
    
    $call =$con->prepare('CALL addWeight(?,?)');
    $call->bind_param('ii',$id,$weight);
    if(!$call->execute()) echo 'error';
    
    $call =$con->prepare('CALL addGoalWeight(?,?)');
    $call->bind_param('ii',$id,$goalWeight);
    if(!$call->execute()) echo 'error';
    
    $call =$con->prepare('CALL 	addGoalStep(?,?)');
    $call->bind_param('ii',$id,$goalStep);
    if(!$call->execute()) echo 'error';
    
    $call =$con->prepare('CALL addGoalBurn(?,?)');
    $call->bind_param('ii',$id,$goalBrun);
    if(!$call->execute()) echo 'error';
    
    $con->close();
?>

