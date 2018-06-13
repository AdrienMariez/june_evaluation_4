<?php
// checks if the page is in edit mode or in create mode, sends to different files depending on answer

if(!empty($_POST['id'])){
    include 'models/mod_edit.php';
}else{
    include 'models/mod_create.php';
}

?>