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
            foreach($stmt->fetchAll() as $row){
                $trainer = new trainer($row['name'], $row['gender'], $row['email'], $row['experience'], $row['certificate'], $row['status']);
                array_push($trainerArray,$trainer);
            }
            return $trainerArray;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }
}