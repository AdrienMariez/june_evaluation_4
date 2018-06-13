<?php

    require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/autoloader.php';

    // removes the selected booking from the table
    
    $idbooking = $_POST['id'];
    Booking::removeSingleBookingById($idbooking);
    header("Location: ../../index.php");

?>