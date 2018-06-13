<?php include 'models/mod_bdd.php';?>  
   
   
   <?php include 'utils/head.php';?>
    <title>
        <?php include 'models/mod_createOrEditTitle.php';?>
    </title>
</head>
<body>
    <!-- this file is currently empty, I'll wait to know if it is needed or not later -->
    <?php include 'utils/header.php';?>

<!-- header -->
    <header class="flexRow flexWrap justifyStart spacingDown">
        <div id="logoContainer"></div>     
        <div id="pageTitleContainer">
            <?php include 'models/mod_createOrEditTitle.php';?>
        </div>
    </header>

<!-- list of infos -->

    <section>
        <?php include 'models/mod_createOrEditContent.php';?> 
    </secion>


    <?php include 'utils/footer.php';?>