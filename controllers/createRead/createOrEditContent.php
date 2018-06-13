<?php
// checks if the page is in edit mode or in create mode, sends to different files depending on answer

    if(!empty($_POST['id'])){
        include 'controllers/createRead/edit.php';
    }else{
        include 'controllers/createRead/create.php';
    }

?>