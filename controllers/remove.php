<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/autoloader.php';

if(!empty($_POST['id'])){
    ?>
    <section class="flexCol justifyCntr">
        <div class="flexCol justifyCntr textAlCntr spacingDown">Êtes-vous sûr-e de vouloir supprimer la réservation N° <?php echo $_POST['id']; ?> ?</div>
        <?php
        echo( Booking::getSingleBookingById($_POST['id']) );
        // $displayOneBooking = new Booking($_POST['id']);
        // echo ($displayOneBooking->getSingleBookingById($_POST['id']));

        ?>
        <div class="flexRow justifyCntr">
            <form action="/index.php" method="get">
                <button type="submit">Annuler</button>
            </form>
            <form action="/controllers/removeAction.php" method="post">
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