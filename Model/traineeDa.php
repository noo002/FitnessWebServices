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

}

//$da = new traineeDa();
//$result = $da->getTraineeDetail(2);
//print_r($result);