<?php
    require_once '../../Connection.php';  
    if(isset($_POST["delete"])) {
        $no = $_POST['no'];
        $query = $con->prepare("DELETE FROM activity WHERE no = ?");
        $query->bind_param('i',$no);
        if(!$query->execute()) {
            echo "fail";
        }
        else{
            echo "successful1";
        }
        $con->close();
    }
        
        
    
    if(isset($_POST["getData"])) {
            
            $no = $_POST['no'];
            $query = $con->prepare("SELECT * FROM activity WHERE no = ?");
            $query->bind_param('i',$no);
            if(!$query->execute()) {
                echo "fail";
            }
            $result = $query->get_result()->fetch_assoc();
            
            $response = array();
            array_push($response, array(
                'name' => $result["name"],
                'desc' => $result["description"],
                'cal' => $result["calories"],
                'time' => $result["suggest_time"],
                'image' => $result["image"],
            ));
            echo json_encode($response);
            $con->close();
          
        }
?>

