<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/autoloader.php';
?>  

   <?php include 'utils/head.php';?>
   <!-- title is dependent on the version of the page : edition or creation -->
    <title>
        <?php include 'controllers/createRead/createOrEditTitle.php';?>
    </title>
</head>
<body>
<!-- header -->
    <header class="flexRow flexWrap justifyStart spacingDown">
        <div id="logoContainer"></div>     
        <div id="pageTitleContainer">
            <?php include 'controllers/createRead/createOrEditTitle.php';?>
        </div>
    </header>

<!-- content -->

    <section  class="flexCol justifyCntr spacingDown">
        <?php include 'controllers/createRead/createOrEditContent.php';?> 
    </secion>


    <?php include 'utils/footer.php';?>