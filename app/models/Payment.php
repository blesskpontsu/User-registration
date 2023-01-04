<?php

namespace app\models;

require_once __DIR__ . '../../../vendor/autoload.php';

use app\database\DatabaseConnection;

class Payment extends DatabaseConnection
{

    public function createPayment($userID, $payment_type, $card_name, $card_number, $expiration, $cvv)
    {
        // Initiating database connection from the DatabaseConnection class 
        $this->connect();

        //Query for inserting payments
        $sql =
            "INSERT INTO payments(userID,payment_type,card_name,card_number,expiration,cvv) VALUES (:userID,:payment_type, :card_name, :card_number, :expiration, :cvv);";

        $param = [
            "userID" => $userID,
            "payment_type" => $payment_type,
            "card_name" => $card_name,
            "card_number" => $card_number,
            "expiration" => $expiration,
            "cvv" => $cvv,
        ];

        //Insert data into the database
        $this->insert($sql, $param);
    }
}
