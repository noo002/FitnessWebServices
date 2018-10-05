<?php
    require_once '../../../Connection.php';
    if(isset($_POST["management"])) {
        session_start(); 
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        
        $query = $con->prepare("SELECT count(*) as count FROM management WHERE email= ? AND password =? AND active=1");
        $query->bind_param('ss',$email,$pass);
        if(!$query->execute()) echo $query->error;
        $result = $query->get_result()->fetch_assoc();
        $_SESSION['login'] = $email;
        echo $result['count'];
    }
    if(isset($_POST["trainer"])) {
        session_start(); 
        $email = $_POST["email"];
        $pass = $_POST["pass"];
        
        $query = $con->prepare("SELECT count(*) as count FROM trainer WHERE email= ? AND password =? AND active=1");
        $query->bind_param('ss',$email,$pass);
        if(!$query->execute()) echo $query->error;
        $result = $query->get_result()->fetch_assoc();
        $_SESSION['login'] = $email;
        echo $result['count'];
    }
    if(isset($_POST["actionm"])) {
        $email = $_POST['email'];
        $query = $con->prepare("SELECT count(*) as count FROM management WHERE email= ?");
        $query->bind_param('s',$email);
        if(!$query->execute()) echo $query->error;
        $result = $query->get_result()->fetch_assoc();
        echo $result['count'];
    }
    if(isset($_POST["actiont"])) {
        $email = $_POST['email'];
        $query = $con->prepare("SELECT count(*) as count FROM trainer WHERE email= ?");
        $query->bind_param('s',$email);
        if(!$query->execute()) echo $query->error;
        $result = $query->get_result()->fetch_assoc();
        echo $result['count'];
    }
    $con->close();
?>