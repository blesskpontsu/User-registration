<?php

namespace app\models;

require_once __DIR__ . '../../../vendor/autoload.php';

use app\database\DatabaseConnection;

class User extends DatabaseConnection
{
    private $id; //This property is to hold the userId

    //Getter method for userId
    public function getID()
    {
        return $this->id;
    }

    // Inserting Data into the database
    public function insertUser($name, $dob, $address, $country, $state, $zip, $profile)
    {
        // Initiating Connection to Database
        $this->connect();

        //SQL query for inserting users
        $sql =
            "INSERT INTO users(name,dob,address,country,state,zip,profile) VALUES (:name,:dob,:address,:country,:state,:zip,:profile);";

        // Parameters
        $param = [
            "name" => $name,
            "dob" => $dob,
            "address" => $address,
            "country" => $country,
            "state" => $state,
            "zip" => $zip,
            "profile" => $profile
        ];

        // Insert Data and get lastInsertId to $id 
        $id = $this->insert($sql, $param);

        // Assigning lastInsertId to $id property
        $this->id = $id;
    }
}
