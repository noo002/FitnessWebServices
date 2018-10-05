<?php
    if(isset($_POST['allActitviy'])) {
        $no = $_POST['no'];
        require_once '../../Connection.php'; 
        $query = $con->prepare("SELECT activity.no , name , description , calories ,image ,time FROM activity left JOIN activityplandetail ON activity.no = activityplandetail.activityNo AND activityplandetail.no = ? ORDER BY time DESC ,name ASC");
        $query->bind_param('i',$no);
        if(!$query->execute()) {
                echo "fail";
        }
        $response = array();
        $result = $query->get_result();
            while($row = $result->fetch_Array()) {
                array_push($response, array(
                'no' => $row[0],
                'name' => $row[1],
                'desc' => $row[2],
                'cal' => $row[3],
                'image' => $row[4],
                'time' => $row[5],
            ));
        }
        
        echo json_encode($response);
        $con->close();
    }
    if(isset($_POST['getName'])) {
        $no = $_POST['no'];
        require_once '../../Connection.php';  
        $query = $con->prepare("SELECT name FROM activityplan WHERE no = ?");
        $query->bind_param('i',$no);
        if(!$query->execute()) {
            echo "fail";
        }
        $result = $query->get_result()->fetch_assoc();
        $con->close();
        echo $result['name'];
    }
    if(isset($_POST['getAll'])) {
        $no = $_POST['no'];
        require_once '../../Connection.php';
        $query = $con->prepare("SELECT activity.image , activity.name ,description,activityplandetail.time ,(activityplandetail.time * activity.calories) as calories ,activity.calories FROM activityplandetail INNER join activity  on activityplandetail.activityNo = activity.no AND activityplandetail.no = ? ORDER BY activity.name ASC");
        $query->bind_param('i',$no);
        if(!$query->execute()) {
            echo "fail";
        }
        $response = array();
        $result = $query->get_result();
        while($row = $result->fetch_Array()) {  
            array_push($response,array(
            'image' => $row[0],
            'name' => $row[1],
            'desc' => $row[2],
            'time' => $row[3],
            'cal' => $row[4],
            'cals' => $row[5],
            ));
        }

        echo json_encode($response);
        $con->close();
    }
    if(isset($_POST['edit'])) {
        require_once '../../Connection.php';
        $no = $_POST['no'];
        $activtiyNo = $_POST['activityNo'];
        $time = $_POST['time'];
        $name = $_POST['name'];
        
        $query = $con->prepare("DELETE FROM activityplandetail WHERE no =?");
        $query->bind_param('i',$no);
        if(!$query->execute()) echo $query->error;
        else{
            for ($x = 0; $x < sizeof($activtiyNo); $x++) {
                $query = $con->prepare("INSERT INTO activityplandetail (no,activityNo,time) VALUES (?,?,?)");
                $query->bind_param('iii',$no,$activtiyNo[$x],$time[$x]);
                if(!$query->execute()) {
                    echo $query->error;
                }
            }
            $query = $con->prepare("UPDATE activityplan SET name=? WHERE no =?");
            $query->bind_param('si',$name,$no);
            if(!$query->execute()) {
                echo $query->error;
            }
            
        }
        

        //echo "Update Successful";
        $con->close();
    }
    if(isset($_POST['new'])) {
        require_once '../../Connection.php';
        session_start();
        $activtiyNo = $_POST['no'];
        $time = $_POST['time'];
        $name = $_POST['name'];
        
        $myEmail = $_SESSION['login'];
        
        $query = $con->prepare("SELECT id FROM trainer WHERE email = ?");
        $query->bind_param('s',$myEmail);
        if(!$query->execute()) echo $query->error;
        $result = $query->get_result()->fetch_assoc();
        $myId = $result['id'];
        
        $query = $con->prepare("INSERT INTO activityplan (name,trainer_id) VALUES (?,?)");
        $query->bind_param('si',$name,$myId);
        if(!$query->execute()) {
            echo $query->error;
        }
        else{
            $query = $con->prepare("SELECT no FROM activityplan WHERE created_at IN(SELECT MAX(created_at) FROM activityplan WHERE trainer_id=?)");
            $query->bind_param('i',$myId);
            
            if(!$query->execute()) {
                echo $query->error;
            }
            else{
                $result = $query->get_result()->fetch_assoc();
                $no = $result['no'];
                for ($x = 0; $x < sizeof($activtiyNo); $x++) {
                    $query = $con->prepare("INSERT INTO activityplandetail (no,activityNo,time) VALUES (?,?,?)");
                    $query->bind_param('iii',$no,$activtiyNo[$x],$time[$x]);
                    if(!$query->execute()) {
                        echo $query->error;
                    }
                }
                echo "Successful";
                $con->close();
            }
        }
    }
    if(isset($_POST['delete'])) {
        $no = $_POST['no'];
        require_once '../../Connection.php';
        
        $query = $con->prepare("DELETE FROM activityplandetail WHERE no = ? ;");
        $query->bind_param('i',$no);
        if(!$query->execute()) {
            echo "Fail";
        }
        else{
             $query = $con->prepare("DELETE FROM activityplan WHERE no=? ;");
             $query->bind_param('i',$no);
             if(!$query->execute()) {
                echo "Fail";
            }
            else{
                echo 'Success deleted';
            }
        }
    }
    if(isset($_POST['getSelected'])) {
        $no = $_POST['no'];
        require_once '../../Connection.php';
        $query = $con->prepare("SELECT activityNo , time ,name FROM activityplandetail INNER JOIN activityplan ON activityplandetail.no = activityplan.no AND activityplan.no = ?");
        $query->bind_param('i',$no);
        if(!$query->execute()) {
            echo "Fail";
        }
        $response = array();
        $result = $query->get_result();
        while($row = $result->fetch_Array()) {
            array_push($response,array(
                'activityNo'=>$row[0],
                'time'=>$row[1],
                'name'=>$row[2],
            ));
        }
        echo json_encode($response);
        $con->close();
    }
?>

