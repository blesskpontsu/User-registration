<?php

namespace app\controllers;


use app\models\Payment;
use app\models\User;
use DateInterval;
use DateTime;

require_once __DIR__ . '../../../vendor/autoload.php';

class UserController
{
    private $name;
    private $dob;
    private $address;
    private $country;
    private $state;
    private $zip;
    private $profile;

    private $payment_type;
    private $card_name;
    private $card_number;
    private $expiration;
    private $cvv;

    // This methods gets called when the class gets instantiated
    public function __construct($name, $dob, $address, $country, $state, $zip, $profile, $type, $cname, $number, $expiration, $cvv)
    {
        $this->name = $name;
        $this->dob = $dob;
        $this->address = $address;
        $this->country = $country;
        $this->state = $state;
        $this->zip = $zip;
        $this->profile = $profile;

        $this->payment_type = $type;
        $this->card_name = $cname;
        $this->card_number = $number;
        $this->expiration = $expiration;
        $this->cvv = $cvv;
    }

    public function createUser()
    {
        //validation

        $message = array();

        $fields = array(
            'name' => $this->name,
            'date of birth' => $this->dob,
            'address' => $this->address,
            'country' => $this->country,
            'state' => $this->state,
            'zip' => $this->zip,
            'profile' => $this->profile,
            'name on card' => $this->card_name,
            'card number' => $this->card_number,
            'expiration date' => $this->expiration,
            'cvv' => $this->cvv
        );

        foreach ($fields as $key => $value) {

            //validate empty fields
            if (empty(trim($value))) {
                $message[] = "You have to enter your $key";
            }

            //field must contain only alphabets   
            if (!preg_match("/^[a-zA-Z ]*$/", $value)) {
                if ($value != $this->dob && $value != $this->address && $value != $this->zip && $value != $this->profile && $value != $this->card_number && $value != $this->expiration && $value != $this->cvv) {
                    $message[] = "Please enter a valid $key";
                }
            }

            //Checks if a field is only numbers
            if (!preg_match("/^[0-9]{0,15}$/", $value)) {
                if ($value == $this->card_number) {
                    $message[] = "Please enter a valid $key";
                }
            }

            if (!preg_match("/^[0-9]{0,3}$/", $value)) {
                if ($value == $this->cvv) {
                    $message[] = "Please enter a valid $key";
                }
            }
        }

        if (!$this->checkDate($this->dob)) {
            $message[] = "Please enter a valid date";
        } else {
            //If date is valid then convert date to DateTime object
            $dob = new DateTime($this->dob);

            $minLength = DateInterval::createFromDateString("18 years");
            $maxLength = DateInterval::createFromDateString("120 years");

            $minAge = (new DateTime())->sub($minLength);
            $maxAge = (new DateTime())->sub($maxLength);

            if ($dob <= $maxAge) {
                //Make sure the user is not older than 120 years
                $message[] = "You are too old to use this service";
            } elseif ($dob >= $minAge) {
                //Make sure the user is not less than 18 years
                $message[] = "You must be 18 years to use this service";
            }
        }


        $_SESSION['error'] = $message;

        if (!$message == "") {
            header("location: ../../index.php");
        } else {
            $user = new User();
            $user->insertUser(
                $this->name,
                $this->dob,
                $this->address,
                $this->country,
                $this->state,
                $this->zip,
                $this->profile
            );

            $payment = new Payment();
            $payment->createPayment(
                $user->getID(),
                $this->payment_type,
                $this->card_name,
                $this->card_number,
                $this->expiration,
                $this->cvv
            );
        }
    }

    //Method to check for a valid date
    private function checkDate($postedDate)
    {
        if (preg_match('/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/', $postedDate)) {
            list($year, $month, $day) = explode('-', $postedDate);
            return checkdate($month, $day, $year);
        } else {
            return false;
        }
    }
}
