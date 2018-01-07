<?php
    require_once '../Connection.php';
    $no = $_POST['no'];
    $time = $_POST['time'];
    $hr = $_POST['hr'];
    $id = $_POST['id'];
    
    $query = $con->prepare("call addActivityData(?,?,?,?)");
    $query->bind_param('iiii',$time,$hr,$no,$id);
    if(!$query->execute()) 
        echo $query->error;
    else{
        $con->close();
    }
    
    
?>

