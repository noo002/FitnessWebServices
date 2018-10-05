<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of managementLogin
 *
 * @author Asus
 */
require_once 'Connection.php';

//require_once './Management.php';
//require_once '../Control/CommonFunction.php';

class managementLoginDa {

    public function managementLogin($email, $password) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getActiveManagement(?,?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        try {
            $stmt->execute();
            foreach ($stmt->Fetch() as $row) {
                $result = $row;
                break;
            }
            return $result;
        } catch (Exception $ex) {
            $cf = new commonFunction();
            $cf->message($ex->getMessage());
        }
    }

    public function getManagementDetail($email, $password) {
        $conn = Connection::getInstance();
        $sqlSelected = "call  getManagementDetail(?,?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $management = new Management($row['managementId'], $row['name'], $row['gender'], $row['address'], $row['email'], $row['active']);
            }
            return $management;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateManagementPassword($email, $password) {
        $conn = Connection::getInstance();
        $sqlSelected = "call  updateManagementPassword(?,?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function checkEmailExist($email) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getExistedManagement(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $email);
        try {
            $stmt->execute();
            foreach ($stmt->fetch() as $row) {
                $result = $row;
                break;
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getAllManagement() {
        $conn = Connection::getInstance();
        $sqlSelected = "select * from management";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        try {
            $stmt->execute();
            $m = array();
            foreach ($stmt->fetchAll() as $row) {
                $management = new Management($row['managementId'], $row['name'], $row['gender'], $row['address'], $row['email'], $row['active']);
                array_push($m, $management);
            }
            return $m;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

//$da = new managementLoginDa();
//$result = $da->getManagementDetail("eugence966@hotmail.com", 123456);
//print_r($result);