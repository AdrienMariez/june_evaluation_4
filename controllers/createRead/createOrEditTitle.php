<?php
// checks if the page is in edit mode or in create mode, returns different values depending on answer

    if(!empty($_POST['id'])){
        echo "Modifier une réservation";
    }else{
        echo "Créer une réservation";
    }

?>