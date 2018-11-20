<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of trainerDa
 *
 * @author Asus
 */
require_once 'Connection.php';
require_once 'trainer.php';

class trainerDa {

    public function getAllTrainer() {

        $conn = Connection::getInstance();
        $sqlSelected = "select * from trainer";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        try {
            $stmt->execute();
            $trainerArray = array();
            foreach ($stmt->fetchAll() as $row) {
                $trainer = new trainer($row['name'], $row['address'], $row['gender'], $row['birthdate'], $row['email'], $row['experience'], $row['certificate']);
                $trainer->setId($row['trainerId']);
                $trainer->setStatus($row['status']);
                array_push($trainerArray, $trainer);
            }
            return $trainerArray;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function checkExistedEmail($email) {
        $conn = Connection::getInstance();
        $sqlSelected = "call checkExistedTrainerEmail(?)";
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

    public function registerNewTrainer($trainer, $password) {
//private $name, $address, $gender, $birthdate, $email, $experience, $certificate;
        $conn = Connection::getInstance();
        $sqlInserted = "call registerNewTrainer(?,?,?,?,?,?,?,?)";
        $name = $trainer->name;
        $gender = $trainer->gender;
        $email = $trainer->email;
        $cert = $trainer->certificate;
        $address = $trainer->address;
        $birthdate = $trainer->birthdate;
        $year = $trainer->experience;
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $gender);
        $stmt->bindParam(3, $email);
        $stmt->bindParam(4, $cert);
        $stmt->bindParam(5, $address);
        $stmt->bindParam(6, $birthdate);
        $stmt->bindParam(7, $year);
        $stmt->bindParam(8, $password);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function trainerLogin($email, $password) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTrainerLogin(?,?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
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

    public function updateTrainerPassword($email, $password) {
        $conn = Connection::getInstance();
        $sqlUpdated = "call updateTrainerPassword(?,?)";
        $stmt = $conn->getDb()->prepare($sqlUpdated);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    private function getTrainerActivation($trainerId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTrainerId(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $trainerId);
        try {
            $stmt->execute();
            foreach ($stmt->fetch() as $row) {
                $activation = $row;
                break;
            }
            if ($activation == 1) {
                $result = 0;
            } else {
                $result = 1;
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updatetrainerActivation($trainerId) {
        $activation = $this->getTrainerActivation($trainerId);
        $conn = Connection::getInstance();
        $sqlSelected = "call updateTrainerActivation(?,?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $trainerId);
        $stmt->bindParam(2, $activation);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getActiveTrainerId($email) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getActiveTrainerId(?)";
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

    public function getTrainerDetail($email) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTrainerDetail(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $email);
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $trainer = new trainer($row['name'], $row['address'], $row['gender'], $row['birthdate'], $row['email'], $row['experience'], $row['certificate']);
                $trainer->setId($row['trainerId']);
            }
            return $trainer;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateTrainerDetail($trainerId, $name, $gender, $cert, $experience) {
        $conn = Connection::getInstance();
        $sqlInserted = "call updateTrainerDetail(?,?,?,?,?)";
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $stmt->bindParam(1, $trainerId);
        $stmt->bindParam(2, $name);
        $stmt->bindParam(3, $gender);
        $stmt->bindParam(4, $cert);
        $stmt->bindParam(5, $experience);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getDatabasePassword($trainerId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTrainerPassword(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $trainerId);
        try {
            $stmt->execute();
            foreach($stmt->fetch() as $row){
                $result = $row;
                break;
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

//$da = new trainerDa();
//print_r($da->getTrainerDetail("eugence966@hotmail.com"));
//$result = $da->getActiveTrainerId("eugence966@hotmail.com");
//echo $result;
//$result = $da->updatetrainerActivation(1);
//$password = 123456;
//$email = "eugence966@hotmail.com";
////$trainer = new trainer("Marry", "setapak", 1, "2018/8/8", "Marry@hotmail.com", 2, "dragon ball");
//$result = $da->updateTrainerPassword("123.com", "123456");
//echo $result;
