<?php

require_once '../../Connection.php';
if (isset($_POST["active"])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $query = $con->prepare("UPDATE trainer SET active = ? WHERE id =?");
    $query->bind_param('ii', $status, $id);
    if (!$query->execute())
        echo $query->error;
    else
        echo 'done';
}
if (isset($_POST["inactive"])) {
    $id = $_POST['id'];
    $status = $_POST['status'];
    $query = $con->prepare("SELECT COUNT(*) AS count FROM user WHERE trainer_id = ?");
    $query->bind_param('i', $id);
    if (!$query->execute())
        echo $query->error;
    $result = $query->get_result()->fetch_assoc();

    if ($result['count'] == 0) {
        $query = $con->prepare("UPDATE trainer SET active = ? WHERE id =?");
        $query->bind_param('ii', $status, $id);
        if (!$query->execute())
            echo $query->error;
        else
            echo 'This account inactive';
    }
    else {
        echo 'This trainer in Subscribed';
    }
}
if (isset($_POST["getData"])) {
    $id = $_POST['id'];
    $query = $con->prepare("SELECT * FROM trainer  WHERE id =? ORDER BY name ASC");
    $query->bind_param('i', $id);
    if (!$query->execute())
        echo $query->error;
    $result = $query->get_result()->fetch_assoc();
    $response = array();
    array_push($response, array(
        'name' => $result["name"],
        'gender' => $result["gender"],
        'cert' => $result["certificate"],
        'year' => $result["experience"],
    ));
    echo json_encode($response);
}
if (isset($_POST["getStudent"])) {
    $id = $_POST['id'];
    $query = $con->prepare("SELECT * FROM user WHERE trainer_id =? ORDER BY name ASC");
    $query->bind_param('i', $id);
    if (!$query->execute()) {
        echo "fail";
    }
    $result = $query->get_result();
    $response = array();
    while ($row = $result->fetch_Array()) {
        array_push($response, array(
            'name' => $row[1],
            'gender' => $row[2],
            'dob' => $row[3],
            'email' => $row[6],
        ));
    }
    echo json_encode($response);
}
$con->close();
?>

