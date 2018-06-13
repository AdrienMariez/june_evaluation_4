<?php
    require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/autoloader.php';
?>

<div class="flexCol justifyCntr spacingDown">
        <form action="controllers/createRead/createAction.php" method="post">
            <div class="flexCol justifyCntr spacingDown">
                Client :
                <select name="customer" id="">
                    <?php echo( Client::displayOptionsClientsNames() );?>
                </select>
            </div>
            <div class="flexCol justifyCntr spacingDown">
                Chambre :
                <select name="room" id="">
                    <?php echo( Room::displayOptionsRooms() );?>
                </select>
            </div>
            <div class="flexCol justifyCntr spacingDown">
                Date entrée:
                <input type="date" name="dateBegin">
            </div>
            <div class="flexCol justifyCntr spacingDown">
                Date sortie:
                <input type="date" name="dateEnd"><br>
            </div>
            <div class="flexCol justifyCntr spacingDown">
                Status :
                <select name="status" id="">
                    <?php echo( Booking::displayOptionsStatus() );?>
                </select>
            </div>
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