<?php   
    require_once '../Connection.php';
    $no = $_POST['no'];
    
    $query = $con->prepare("SELECT name ,calories ,protein,fat,carbohydrate,image FROM food WHERE no=?");
    $query->bind_param('i',$no);
    if(!$query->execute()) echo "fail";
    
    $response = array();
    $result = $query->get_result()->fetch_Array();
    array_push($response, array(
        'name' =>$result["name"],
        'cal' =>$result["calories"],
        'pro' =>$result["protein"],
        'fat' =>$result["fat"],
        'car' =>$result["carbohydrate"],
        'image' =>$result["image"],
    ));
    
    echo json_encode($response);
    $con->close();
?>

