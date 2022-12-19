<?php

namespace app\database;

use PDO;
use PDOException;

class DatabaseConnection
{
    private $host = 'localhost';
    private $username = 'admin';
    private $password = 'Kp0nt2ubl322.';
    private $database = 'project';
    private $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);
    protected $conn;


    //Establishing connection to the database
    public function connect()
    {
        try {
            $pdo = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
            $this->conn = new PDO($pdo, $this->username, $this->password, $this->options);
        } catch (PDOException $e) {
            echo 'Error Connecting: ' . $e->getMessage();
        }
    }

    public function disconnect()
    {
        $this->conn = null;
    }
}
