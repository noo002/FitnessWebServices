<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Connection
 *
 * @author Asus
 */
class Connection {

    private static $instance;
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "fypfitness";
    private $conn;

    private function __construct() {
        try {// $conn = new PDO("mysql:host=$servername;dbname=emaildemo",$username,$password);
            $this->conn = new PDO('mysql:host=' . $this->servername . ';dbname=' . $this->dbname, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (Exception $ex) {
            die("Failed to connect to DB: " . $ex->getMessage());
        }
    }

    public function getDb() {
        if ($this->conn instanceof PDO) {
            return $this->conn;
        }
    }

    public static function getInstance() {
        if (!self::$instance) {
            self::$instance = new Connection();
        }
        return self::$instance;
    }

    public function close() {
        try {
            $this->conn = null;
        } catch (Exception $ex) {
            echo $ex->getMessage();
        }
    }

}
