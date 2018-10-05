<?php
    require_once '../../Connection.php';
    
    if(isset($_POST["active"])) {
        $id=$_POST['id'];
        $status=$_POST['status'];
        $query = $con->prepare("UPDATE management SET active = ? WHERE id =?");
        $query->bind_param('ii',$status,$id);
        if(!$query->execute()) echo $query->error;
        else echo 'done';
    }
    if(isset($_POST["getData"])) {
        $id=$_POST['id'];
        $query = $con->prepare("SELECT * FROM management  WHERE id =?");
        $query->bind_param('i',$id);
        if(!$query->execute()) echo $query->error;
        $result = $query->get_result()->fetch_assoc();
        $response = array();
        array_push($response, array(
            'name' => $result["name"],
            'gender' => $result["gender"],
        ));
        echo json_encode($response);
    }
    $con->close();
?>