<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/autoloader.php';
?>  

<?php include 'utils/head.php';?>
    <title>Suppression</title>
</head>
<body>

<!-- header -->
<header class="flexRow flexWrap justifyStart spacingDown">
    <div id="logoContainer"></div>     
    <div id="pageTitleContainer">Suppression d'une réservation</div>
</header>

<!-- page content -->

<?php include 'controllers/remove.php';?>  


<?php include 'utils/footer.php';?>