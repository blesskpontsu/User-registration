<?php
error_reporting(E_ALL);
error_reporting(-1);
ini_set('display_errors', 'On');

session_start();


use app\controllers\UserController;


if (isset($_POST['submit'])) {
    require_once __DIR__ . '../../../vendor/autoload.php';


    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $zip = $_POST['zip'];
    $profile = $_POST['profile'];

    $payment_type = $_POST['payment_type'];
    $card_name = $_POST['card_name'];
    $card_number = $_POST['card_number'];
    $expiration = $_POST['expiration'];
    $cvv = $_POST['cvv'];


    $user = new UserController(
        $name,
        $dob,
        $address,
        $country,
        $state,
        $zip,
        $profile,
        $payment_type,
        $card_name,
        $card_number,
        $expiration,
        $cvv
    );

    $user->createUser();


    echo "<script>alert('Record Added Successfully');document.location='../../index.php'</script>";
}
