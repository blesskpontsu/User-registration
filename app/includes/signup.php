<?php

use app\models\Payment;
use app\models\User;

if (isset($_POST['submit'])) {
    require_once __DIR__ . '../../../vendor/autoload.php';

    $payment_id = 1;
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

    $payment = new Payment(
        $payment_type,
        $card_name,
        $card_number,
        $expiration,
        $cvv
    );
    $user = new User(
        $payment_id,
        $name,
        $dob,
        $address,
        $country,
        $state,
        $zip,
        $profile
    );

    $payment->createPayment();
    $user->createUser();

    echo $payment->getID();

    // echo "<script>alert('user created');document.location='../../dashboard.php'</script>";
}
