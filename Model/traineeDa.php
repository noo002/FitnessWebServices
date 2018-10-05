<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of traineeDa
 *
 * @author Asus
 */
require_once 'Connection.php';
//require_once '../Model/trainee.php';


class traineeDa {
    public function getAllTrainee(){
        $conn = Connection::getInstance();
        $sqlSelected = "call getAllTrainee()";
        $stmt  = $conn->getDb()->prepare($sqlSelected);
        $traineeArray = array();
        try{
            $stmt->execute();
            foreach($stmt->fetchAll() as $row){
                $trainee = new trainee($row['name'], $row['address'],$row['gender'],$row['birthDate'] , $row['email'], $row['status']);
                array_push($traineeArray,$trainee);
            }
            return $traineeArray;
        } catch (Exception $ex) {
            $cf = new commonFunction();
            $cf->message($ex->getMessage());
        }
    }
}
//$da = new traineeDa();
//$result = $da->getAllTrainee();
//foreach($result as $row=>$key){
//    echo $key->name."<br/>";
//}