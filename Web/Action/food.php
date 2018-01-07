<?php
    if(isset($_POST['delete'])){
        require_once '../../Connection.php'; 
        $no=$_POST['no'];
        $query = $con->prepare("DELETE FROM food WHERE no = ?");
        $query->bind_param('i',$no);
        if(!$query->execute()) {
            echo $query->error;
        }
        else{
            echo "successful1";
            location.reload();
        }
        $con->close();
    }
    if(isset($_POST['getData'])){
        require_once '../../Connection.php'; 
        $no=$_POST['no'];
        $query = $con->prepare("SELECT * FROM food WHERE no = ?");
        $query->bind_param('i',$no);
        if(!$query->execute()) {
            echo $query->error;
        }
        $result = $query->get_result()->fetch_assoc();
        $response = array();
        array_push($response, array(
                'name' => $result["name"],
                'barcode' => $result["barcode"],
                'cal' => $result["calories"],
                'protein' => $result["protein"],
                'fat' => $result["fat"],
                'carboh' => $result["carbohydrate"],
                'image' => $result["image"],
            ));
        echo json_encode($response);
        $con->close();
    }
?>

