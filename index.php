    <?php include 'models/mod_bdd.php';?>  
   
   
   <?php include 'utils/head.php';?>
    <title>Gestion des réservations</title>
</head>
<body>
    <!-- this file is currently empty, I'll wait to know if it is needed or not later -->
    <?php include 'utils/header.php';?>

<!-- header -->
    <header class="flexRow flexWrap justifyStart spacingDown">
            <div id="logoContainer"></div>     
            <div id="pageTitleContainer">Gestion des réservations</div>
    </header>

<!-- create button -->
    <div class="flexRow flexWrap spacingDown">
        <div>
            <form action="/edit.php" method="get">
                <button type="submit">créer nouvelle réservation</button>
            </form>
        </div>


<!-- filter -->        
        <div id="filterContainer">
            <select name="" id="">
                <option value="valide">reservations validées</option>
                <option value="attente">réservations en attente</option>
                <option value="refus">réservations refusées</option>
            </select>
        </div>
    </div>
    
<!-- table showing current reservations -->
    <table class="tablesBig">
        <tr>
            <th>Id</th>
            <th>Client</th>
            <th>Chambre</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        <?php include 'models/mod_reservationList.php';?>  
        </table> 



    <?php include 'utils/footer.php';?>