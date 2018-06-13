<?php
    //the autoloader is called multiple times as it wasn't loading correctly on all views.
    require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/autoloader.php';
?>  
   
   
<?php include 'utils/head.php';?>
    <title>Gestion des réservations</title>
</head>
<body>

<!-- header -->
    <header class="flexRow flexWrap justifyStart spacingDown">
            <div id="logoContainer"></div>     
            <div id="pageTitleContainer">Gestion des réservations</div>
    </header>

<!-- create booking button -->
    <div class="flexRow flexWrap spacingDown">
        <div>
            <form action="/edit.php" method="get">
                <button type="submit">Créer nouvelle réservation</button>
            </form>
        </div>


<!-- filter -->
    <!-- Not working -->      
        <div id="filterContainer">
            <select name="" id="">
                <option value="valide">Réservations validées</option>
                <option value="attente">Réservations en attente</option>
                <option value="refus">Réservations refusées</option>
            </select>
        </div>
    </div>
    
<!-- table showing current reservations -->
    <table class="tablesBig">
        <tr>
            <th>Id</th>
            <th>Client</th>
            <th>Chambre</th>
            <th>Dates</th>
            <th>Action</th>
        </tr>
<!-- populate the table -->
        <?php include 'controllers/index.php';?>  
    </table> 



    <?php include 'utils/footer.php';?>