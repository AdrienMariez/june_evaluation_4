<?php
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/autoloader.php';  

$idBooking = $_POST['id'];
?>

<div class="flexCol justifyCntr spacingDown">
        <form action="controllers/createRead/editAction.php" method="post">
            <div class="flexCol justifyCntr spacingDown">
                Client :
                <select name="customer" id="">
                    <?php echo( Client::displayOptionsClientsNamesUpdate($idBooking) );?>
                </select>
            </div>
            <div class="flexCol justifyCntr spacingDown">
                Chambre :
                <select name="room" id="">
                    <?php echo( Room::displayOptionsRoomsUpdate($idBooking) );?>
                </select>
            </div>
            <div class="flexCol justifyCntr spacingDown">
                Date entrée:
                <input type="date" name="dateBegin" value="<?php echo( Booking::displayBeginDate($idBooking) );?>"
                >
            </div>
            <div class="flexCol justifyCntr spacingDown">
                Date sortie:
                <input type="date" name="dateEnd" value="<?php echo( Booking::displayEndDate($idBooking) );?>"
                >
            </div>
            <div class="flexCol justifyCntr spacingDown">
                Status :
                <select name="status">
                    <?php echo( Booking::displayOptionsStatusUpdate($idBooking) );?>
                </select>
            </div>
            <input class='invisible' name='id' value='<?php echo $idBooking?>'>
            <div class="flexCol justifyCntr spacingDown">
                <button type="submit">Enregistrer</button>
            </div>
        </form>
        <form action="/index.php" method="get">
            <div class="flexCol justifyCntr spacingDown">
                <button type="submit">Retour</button>
            </div>
        </form>

</div>