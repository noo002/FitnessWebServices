<?php
    require_once '../Connection.php';
    $barcode = $_POST['barcode'];
    $query = $con->prepare("call barcodeSearch(?,@no)");
    $query->bind_param('s',$barcode);
    if(!$query->execute()) echo $query->error;
    
    $result = $con->query("SELECT @no")->fetch_assoc();
    
    $response = array();
    $no =0;
    if($result["@no"]!=null) {
        $no = $result["@no"];
    }
    array_push($response, array('no' => $no));
    
    echo json_encode($response);
    
    $con->close();
?>

