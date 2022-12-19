<?php

namespace app\models;

require_once __DIR__ . '../../../vendor/autoload.php';

use PDOException;
use app\database\DatabaseConnection;



class Payment extends DatabaseConnection
{
    private $payment_type;
    private $card_name;
    private $card_number;
    private $expiration;
    private $cvv;
    private $id;

    public function __construct($type, $name, $number, $expiration, $cvv)
    {
        $this->payment_type = $type;
        $this->card_name = $name;
        $this->card_number = $number;
        $this->expiration = $expiration;
        $this->cvv = $cvv;
    }

    public function getID()
    {
        return $this->id;
    }


    public function createPayment()
    {
        try {
            $this->connect();
            $sql =
                "INSERT INTO payment(
                payment_type,
                card_name,
                card_number,
                expiration,
                cvv
                ) 
                VALUES (
                    :payment_type, 
                    :card_name, 
                    :card_number, 
                    :expiration, 
                    :cvv
                    );";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                "payment_type" => $this->payment_type,
                "card_name" => $this->card_name,
                "card_number" => $this->card_number,
                "expiration" => $this->expiration,
                "cvv" => $this->cvv
            ]);
            $this->id = $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo 'Error inserting payments: ' . $e->getMessage();
        }
        $stmt = $this->disconnect();
    }
}
