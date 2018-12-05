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

    public function getAllTrainee() {
        $conn = Connection::getInstance();
        $sqlSelected = "call getAllTrainee()";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $traineeArray = array();
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $trainee = new trainee($row['name'], $row['address'], $row['gender'], $row['birthDate'], $row['email'], $row['status']);
                $trainee->setTraineeId($row['traineeId']);
                array_push($traineeArray, $trainee);
            }
            return $traineeArray;
        } catch (Exception $ex) {
            $cf = new commonFunction();
            $cf->message($ex->getMessage());
        }
    }

    public function getTraineeListByTrainer($id) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTraineeListByTrainer(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $id);
        $trainee = array();
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $detail = array(
                    "traineeId" => $row['traineeId'],
                    "description" => $row['description'],
                    "name" => $row['name'],
                    "gender" => $row['gender'],
                    "age" => $row['age'],
                    "email" => $row['email']
                );
                array_push($trainee, $detail);
            }
            return $trainee;
        } catch (Exception $ex) {
            $cf = new commonFunction();
            $cf->message($ex->getMessage());
        }
    }

    public function getTraineeDetail($traineeId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTraineeDetail(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $traineeId);
        try {
            $stmt->execute();
            foreach ($stmt->fetchAll() as $row) {
                $trainee = new trainee($row['name'], $row['address'], $row['gender'], $row['birthDate'], $row['email'], $row['status']);
                $trainee->setTraineeId($row['traineeId']);
                $trainee->setImage($row['image']);
            }
            return $trainee;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getTraineeName($traineeId) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTraineeName(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $traineeId);

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

    public function registerNewTrainee($name, $address, $gender, $birthdate, $email, $password, $image) {
        $conn = Connection::getInstance();
        $sqlInserted = "call registerNewTrainee(?,?,?,?,?,?,?)";
        $stmt = $conn->getDb()->prepare($sqlInserted);
        $stmt->bindParam(1, $name);
        $stmt->bindParam(2, $address);
        $stmt->bindParam(3, $gender);
        $stmt->bindParam(4, $birthdate);
        $stmt->bindParam(5, $email);
        $stmt->bindParam(6, $password);
        $stmt->bindParam(7, $image);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function getTraineeEmail($email) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTraineeEmail(?)";
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

    public function getUser($email) {
        $conn = Connection::getInstance();
        $sqlSelected = "call getTrainee(?)";
        $stmt = $conn->getDb()->prepare($sqlSelected);
        $stmt->bindParam(1, $email);
        try {
            $stmt->execute();
            $result = array();
            foreach ($stmt->fetchAll() as $row) {
                $a = array(
                    'traineeId' => $row['traineeId'],
                    'name' => $row['name'],
                    'address' => $row['address'],
                    'gender' => $row['gender'],
                    'birthDate' => $row['birthdate'],
                    'password' => $row['password'],
                    'image' => $row['image']
                );
                array_push($result, $a);
            }
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function traineeLogin($email, $password) {
        $conn = Connection::getInstance();
        $sqlSelected = "call traineeLogin(?,?)";
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

    public function updateTraineePassword($email, $password) {
        $conn = Connection::getInstance();
        $sqlUpdated = "call updateTraineePassword(?,?)";
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

    public function updateGender($traineeId, $gender) {
        $conn = Connection::getInstance();
        $sqlUpdated = "call updateGender(?,?)";
        $stmt = $conn->getDb()->prepare($sqlUpdated);
        $stmt->bindParam(1, $traineeId);
        $stmt->bindParam(2, $gender);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateImage($traineeId, $image) {
        $conn = Connection::getInstance();
        $sqlUpdated = "call updateTraineeImage(?,?)";
        $stmt = $conn->getDb()->prepare($sqlUpdated);
        $stmt->bindParam(1, $traineeId);
        $stmt->bindParam(2, $image);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updateTraineeName($traineeId, $name) {
        $conn = Connection::getInstance();
        $sqlUpdated = "call updateTraineeName(?,?)";
        $stmt = $conn->getDb()->prepare($sqlUpdated);
        $stmt->bindParam(1, $traineeId);
        $stmt->bindParam(2, $name);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

    public function updatePassword($traineeId, $password) {
        $conn = Connection::getInstance();
        $sqlUpdated = "call updatePassword(?,?)";
        $stmt = $conn->getDb()->prepare($sqlUpdated);
        $stmt->bindParam(1, $traineeId);
        $stmt->bindParam(2, $password);
        try {
            $result = $stmt->execute();
            return $result;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}

//$da = new traineeDa();
//$result = $da->getTraineeDetail(2);
//print_r($result);