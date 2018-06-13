<?php

if(!empty($_POST['id'])){
        // TODO : remove stuff from table
        header("Location: ../index.php");
}else{
    echo "erreur : pas de réservation selectionnée.";
    header("Location: ../index.php");
}
?>