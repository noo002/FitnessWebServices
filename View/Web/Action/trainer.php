<?php
    if(isset($_POST["action"])) {
        require_once '../../Connection.php';
        if($_POST["action"]=="getData") {
            $id =$_POST["id"];
  
            $_SESSION["student"] = $id;
            $query = $con->prepare("SELECT rate FROM healthprofile WHERE created_at IN(SELECT MAX(created_at) FROM healthprofile WHERE user_id=? AND type=0)");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result()->fetch_assoc();
            $weight = $result["rate"];
            
            $query = $con->prepare("SELECT rate FROM healthprofile WHERE type=1 AND user_id = ? ORDER by created_at DESC LIMIT 1");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result()->fetch_assoc();
            $step = $result["rate"];
            
            $query = $con->prepare("SELECT rate FROM healthprofile WHERE type=2 AND user_id = ? ORDER by created_at DESC LIMIT 1");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result()->fetch_assoc();
            $hr = $result["rate"];
            
            $query = $con->prepare("SELECT DATE_FORMAT(activitydata.created_at, '%M %d %Y') AS date ,SUM(duration*(calories/60))AS burn FROM activitydata INNER JOIN activity ON activity.no = activityNo AND userId= ? GROUP BY date ORDER BY date DESC LIMIT 1");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result()->fetch_assoc();
            $activtiyBrun = $result["burn"];
            
            $query = $con->prepare("SELECT DATE_FORMAT(dietdata.created_at, '%M %d %Y') AS date, SUM(qty*calories) AS take FROM dietdata INNER JOIN food ON food_no = food.no AND user_id =? GROUP BY date ORDER BY date DESC LIMIT 1");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result()->fetch_assoc();
            $dietBurn = $result["take"];
            
            $query = $con->prepare("SELECT rate FROM goal WHERE created_at IN(SELECT MAX(created_at) FROM goal WHERE type =0 AND user_id = ?)");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result()->fetch_assoc();
            $goalWeight = $result["rate"];
            
            $query = $con->prepare("SELECT rate FROM goal WHERE created_at IN(SELECT MAX(created_at) FROM goal WHERE type =1 AND user_id = ?)");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result()->fetch_assoc();
            $goalStep = $result["rate"];
            
            $query = $con->prepare("SELECT rate FROM goal WHERE created_at IN(SELECT MAX(created_at) FROM goal WHERE type =2 AND user_id = ?)");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result()->fetch_assoc();
            $goalBrun = $result["rate"];
            
            $query = $con->prepare("SELECT * FROM user WHERE id=?");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result()->fetch_assoc();
            $response = array();
            array_push($response, array(
                'name' => $result["name"],
                'gender' => $result["gender"],
                'dob' => $result["dob"],
                'image' => $result["image"],
                'email' => $result["email"],
                'created_at' => $result["created_at"],
                'height' => $result["height"],
                'weight' =>$weight,
                'step'=>$step,
                'hr'=>$hr,
                'activtiyBrun'=>$activtiyBrun,
                'dietBurn'=>$dietBurn,
                'goalWeight'=>$goalWeight,
                'goalStep'=>$goalStep,
                'goalBrun'=>$goalBrun,
            ));
            echo json_encode($response);
            $con->close();
        }
        if($_POST["action"]=='weight'){
            $id =$_POST["id"];
            $query = $con->prepare("SELECT DATE_FORMAT(created_at, '%M %d %Y') , rate FROM healthprofile WHERE type =0 AND user_id =? ORDER BY created_at ASC");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result();
            $rows = array();
            while($row = $result->fetch_Array()) {
                $rows[] = array($row[0],$row[1]);
            }
            echo json_encode($rows);
            $con->close();
        }
        if($_POST["action"]=='hr'){
            $id =$_POST["id"];
            $query = $con->prepare("SELECT DATE_FORMAT(created_at, '%M %d %Y') , rate FROM healthprofile WHERE type =2 AND user_id =? ORDER BY created_at ASC");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result();
            $rows = array();
            while($row = $result->fetch_Array()) {
                $rows[] = array($row[0],$row[1]);
            }
            echo json_encode($rows);
            $con->close();
        }
        if($_POST["action"]=='step'){
            $id =$_POST["id"];
            $query = $con->prepare("SELECT DATE_FORMAT(created_at, '%M %d %Y') , rate FROM healthprofile WHERE type =1 AND user_id =? ORDER BY created_at ASC");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result();
            $rows = array();
            while($row = $result->fetch_Array()) {
                $rows[] = array($row[0],$row[1]);
            }
            echo json_encode($rows);
            $con->close();
        }
        if($_POST["action"]=='workout'){
            $id =$_POST["id"];
            $query = $con->prepare("SELECT DATE_FORMAT(activitydata.created_at, '%M %d %Y') as date , SUM(duration * (calories/60)) FROM activitydata INNER JOIN activity ON activity.no = activitydata.activityNo AND userId = ? GROUP BY date ORDER BY activitydata.created_at ASC ");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result();
            $rows = array();
            while($row = $result->fetch_Array()) {
                $rows[] = array($row[0],(int)($row[1]));
            }
            echo json_encode($rows);
            $con->close();
        }
        if($_POST["action"]=='diet'){
            $id =$_POST["id"];
            $query = $con->prepare("SELECT DATE_FORMAT(dietdata.created_at, '%M %d %Y')as date, SUM(qty*calories) FROM dietdata INNER JOIN food ON food_no = food.no AND user_id = ? GROUP BY date ORDER BY dietdata.created_at ASC");
            $query->bind_param('i',$id);
            if(!$query->execute()) echo $query->error;
            $result = $query->get_result();
            $rows = array();
            while($row = $result->fetch_Array()) {
                $rows[] = array($row[0],(int)$row[1]);
            }
            echo json_encode($rows);
            $con->close();
        }
        
    }
    if($_POST["action"]=='assigned'){
        $id = $_POST['id'];
        $query = $con->prepare('SELECT name ,start_date ,end_date,activityassigned.no FROM activityassigned INNER JOIN activityplan ON plan_no = activityplan.no AND user_id = ?');
        $query->bind_param('i',$id);
        if(!$query->execute()) echo $query->error;
        else{
            $response = array();
            $result = $query->get_result();
            while($row = $result->fetch_Array()) {
                array_push($response,array(
                    'name'=>$row[0],
                    'start'=>$row[1],
                    'end'=>$row[2],
                    'no'=>$row[3],
                ));
            }
            echo json_encode($response);
        }
        
        $con->close();
    }
    if($_POST["action"]=='getPlanName'){
        $id = $_POST['id'];
        $query = $con->prepare('SELECT no ,name FROM activityplan WHERE trainer_id = ?');
        $query->bind_param('i',$id);
        if(!$query->execute()) echo $query->error;
        
        $response = array();
        $result = $query->get_result();
        while($row = $result->fetch_Array()) {
            array_push($response,array(
                'no'=>$row[0],
                'name'=>$row[1],
            ));
        }
        echo json_encode($response);
        $con->close();
    }
    if($_POST["action"]=='deletePlan'){
        $no = $_POST['no'];
        $query = $con->prepare('DELETE FROM activityassigned WHERE no =?');
        $query->bind_param('i',$no);
        if(!$query->execute()) echo $query->error;
        else echo 'Plan Deleted';
    }
    

?>
