<?php

namespace app\database;

use PDO;
use Exception;
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
    protected function connect()
    {
        try {
            $pdo = 'mysql:host=' . $this->host . ';dbname=' . $this->database;
            $this->conn = new PDO($pdo, $this->username, $this->password, $this->options);
        } catch (PDOException $e) {
            echo 'Error Connecting: ' . $e->getMessage();
        }
    }

    protected function execute($query = "", $param = [])
    {
        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute($param);
            return $stmt;
        } catch (Exception $e) {
            return throw new Exception($e->getMessage());
        }
    }

    protected function insert($query, $param)
    {
        try {
            $this->execute($query, $param);
            return $this->conn->lastInsertId();
        } catch (Exception $e) {
            return throw new Exception($e->getMessage());
        }
    }

    protected function select($query = "", $param = [])
    {
        try {
            $stmt = $this->execute($query, $param);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            return throw new Exception($e->getMessage());
        }
    }

    protected function disconnect()
    {
        $this->conn = null;
    }
}
