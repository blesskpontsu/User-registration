<?php

namespace app\models;

require_once __DIR__ . '../../../vendor/autoload.php';

use app\database\DatabaseConnection;
use PDOException;

class User extends DatabaseConnection
{
    private $payment_id;
    private $name;
    private $dob;
    private $address;
    private $country;
    private $state;
    private $zip;
    private $profile;


    //This is called when the class gets instantiated
    public function __construct($payment_id, $name, $dob, $address, $country, $state, $zip, $profile)
    {
        $this->payment_id = $payment_id;
        $this->name = $name;
        $this->dob = $dob;
        $this->address = $address;
        $this->country = $country;
        $this->state = $state;
        $this->zip = $zip;
        $this->profile = $profile;
    }

    //Getter and Setter methods

    //ID

    // This method inserts data into the database
    public function createUser()
    {
        //Using Prepared Statements
        try {
            //Initiating Database Connection
            $this->connect();

            //SQL query
            $sql =
                "INSERT INTO users(
                    paymentID,
                    name,
                    dob,
                    address,
                    country,
                    state,
                    zip,
                    profile
                ) 
                VALUES 
                (
                    :paymentID,
                    :name,
                    :dob,
                    :address,
                    :country,
                    :state,
                    :zip,
                    :profile
                );";

            // Preparing Query for Execusion
            $stmt = $this->conn->prepare($sql);

            // Executing Query
            $stmt->execute([
                "paymentID" => $this->payment_id,
                "name" => $this->name,
                "dob" => $this->dob,
                "address" => $this->address,
                "country" => $this->country,
                "state" => $this->state,
                "zip" => $this->zip,
                "profile" => $this->profile
            ]);
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }

        //Closing connection to the database
        $stmt = $this->disconnect();
    }
}
