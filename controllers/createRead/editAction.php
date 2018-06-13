<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/autoloader.php';

$today = date("Y-m-d");


if(!empty($_POST['id']) || !empty($_POST['customer']) || !empty($_POST['room']) || !empty($_POST['dateBegin']) || !empty($_POST['dateEnd']) || !empty($_POST['status'])){
    if ($_POST['dateBegin'] < $_POST['dateEnd'] && $_POST['dateBegin'] >= $today) {
        $id = $_POST['id'];
        $clientId = $_POST['customer'];
        $roomId = $_POST['room'];
        //this date format is ugly but it works
        $dateBegin = $_POST['dateBegin']." 00:00:00";
        $dateEnd = $_POST['dateEnd']." 00:00:00";
        $status = $_POST['status'];
        $today .= " 00:00:00";

        //uncomment and remove header to see what info is passed
            // echo "id : ";
            // echo $id;
            // echo "</br>";
            // echo "clientId : ";
            // echo $clientId;
            // echo "</br>";
            // echo "roomId : ";
            // echo $roomId;
            // echo "</br>";
            // echo "dateBegin : ";
            // echo $dateBegin;
            // echo "</br>";
            // echo "dateEnd : ";
            // echo $dateEnd;
            // echo "</br>";
            // echo "status : ";
            // echo $status;
            // echo "</br>";
            // echo "today : ";
            // echo $today;
        //end comment list

        //I did not manage to use the constructor yet so I made another method using no constructor
        Booking::editBookingNoConstructor($id, $clientId, $roomId, $dateBegin, $dateEnd, $status, $today);
        header("Location: ../../../index.php");
    }
    else{
        echo "erreur : Les informations de la nouvelle réservation sont incorrectes.";
        header("Location: ../../index.php");
    }
}
else{
    echo "erreur : Les informations de la nouvelle réservation sont incorrectes.";
    header("Location: ../../index.php");
}