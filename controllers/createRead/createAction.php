<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/autoloader.php';

$today = date("Y-m-d");


if(!empty($_POST['customer']) || !empty($_POST['room']) || !empty($_POST['dateBegin']) || !empty($_POST['dateEnd']) || !empty($_POST['status'])){
    if ($_POST['dateBegin'] < $_POST['dateEnd'] && $_POST['dateBegin'] >= $today) {
        $clientId = $_POST['customer'];
        $roomId = $_POST['room'];
        $dateBegin = $_POST['dateBegin']." 00:00:00";
        $dateEnd = $_POST['dateEnd']." 00:00:00";
        $status = $_POST['status'];
        $today .= " 00:00:00";

        echo $clientId;
        echo $roomId;
        echo $dateBegin;
        echo $dateEnd;
        echo $status;
        echo $today;

        //I did not manage to use the constructor yet so I made another method using no constructor
        Booking::pushNewBookingNoConstructor($clientId, $roomId, $dateBegin, $dateEnd, $status, $today);
        header("Location: ../../../index.php");

        // $createBooking = new User($clientId,$roomId,$dateBegin,$dateEnd,$status,$today);
        // echo ($createBooking->pushNewBooking());
    }
    else{
        echo "erreur : Les informations de la nouvelle réservation sont incorrectes.";
        header("Location: ../../edit.php");
    }
}
else{
    echo "erreur : Les informations de la nouvelle réservation sont incorrectes.";
    header("Location: ../../edit.php");
}