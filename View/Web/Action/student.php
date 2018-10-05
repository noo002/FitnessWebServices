<?php
    if(isset($_POST['findTrainer'])) {
        $id = $_POST['id'];
        require_once '../../Connection.php'; 
        $query = $con->prepare("SELECT trainer_id FROM user WHERE id = ?");
        $query->bind_param('i',$id);
        if(!$query->execute()) echo $query->error;
        $result = $query->get_result()->fetch_assoc();
        echo $result['trainer_id'];
        $con->close();
    }
?>

