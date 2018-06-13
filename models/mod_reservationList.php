<?php
// filling the table for the reservation list


$result = $conn->query("SELECT reservations.id, clients.nom, chambres.numero, reservations.dateEntree, reservations.dateSortie
FROM reservations,clients,chambres
WHERE reservations.clientId = clients.id AND reservations.chambreId = chambres.id");

if($result->num_rows > 0){
    while($row = $result->fetch_assoc()) {
        $datebegin = date_create($row["dateEntree"]);
        $dateend = date_create($row["dateSortie"]);
        ?>
        <tr>
        <td><?php echo $row["id"]; ?></td>
        <td><?php echo $row["nom"]; ?></td>
        <td><?php echo "N° " . $row["numero"]; ?></td>
        <td><?php echo date_format($datebegin, 'd/m/Y'); ?></td>
        <td>
        <form action="/edit.php" method="post">
            <input class="invisible" name="id" value="<?php echo $row["id"]; ?>">
            <button type="submit">edit</button>
        </form>
        <form action="/remove.php" method="post">
            <input class="invisible" name="id" value="<?php echo $row["id"]; ?>">
            <button>remove</button>
        </form>
        </td>
        </tr>
        <?php
    }
}
else {
    echo "Aucune réservation n'a été trouvée.";
}
?>