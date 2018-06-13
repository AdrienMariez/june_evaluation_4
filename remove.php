<?php include 'mod_models/bdd.php';?>  


<?php include 'utils/head.php';?>
<title>Suppression</title>
</head>
<body>
<!-- this file is currently empty, I'll wait to know if it is needed or not later -->
<?php include 'utils/header.php';?>

<!-- header -->
<header class="flexRow flexWrap justifyStart spacingDown">
    <div id="logoContainer"></div>     
    <div id="pageTitleContainer">Suppression d'une réservation</div>
</header>

<!-- page content -->

<?php

if(!empty($_POST['id'])){
    ?>
    <section class="flexCol justifyCntr">
        <div class="flexRow justifyCntr spacingDown">Êtes-vous sûr-e de vouloir supprimer la réservation N° <?php echo $_POST['id']; ?> ?</div>
        <div class="flexRow justifyCntr">
            <form action="/index.php" method="get">
                <button type="submit">Annuler</button>
            </form>
            <form action="/models/mod_delete.php" method="post">
                <input class="invisible" name="id" value="<?php echo $_POST['id']; ?>">
                <button type="submit">Confirmer la suppression</button>
            </form>
        </div>
    </section>
    <?php
}else{
    echo "erreur : pas de réservation selectionnée.";
    header("Location: index.php");
}
?>


<?php include 'utils/footer.php';?>