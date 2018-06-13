<?php

class Room{
    private $id;
    private $number;
    private $name;
    private $priceRange;
    private $status;
    // constructor
        public function __construct($id, $number, $name, $priceRange, $status){
            $this->id = $id;
            $this->number = $number;
            $this->name = $name;
            $this->priceRange = $priceRange;
            $this->status = $status;
        }
    //displayOptionsRooms
        public static function displayOptionsRooms(){
            $stmt = Database::prepare('SELECT chambres.id, chambres.nom, chambres.numero FROM chambres');
            $stmt->execute();

            $rooms = '';

            while ($row = $stmt->fetch())
            {
                $rooms .= "<option value='".$row['id']."'>";
                $rooms .= "N°".$row['numero']." : ".$row['nom'];
                $rooms .= "</option>";
            };

            return $rooms;
        }
    //displayOptionsRoomsUpdate
        public static function displayOptionsRoomsUpdate($bookingId){
            $stmt = Database::prepare('SELECT chambres.id, chambres.nom, chambres.numero FROM chambres INNER JOIN reservations WHERE reservations.id=:booking AND reservations.chambreId = chambres.id');
            $stmt->execute(['booking' => $bookingId]);

            $rooms = '';

            while ($row = $stmt->fetch())
            {
                $rooms .= "<option value='".$row['id']."' selected>";
                $rooms .= "N°".$row['numero']." : ".$row['nom'];
                $rooms .= "</option>";
            };

            $stmt2 = Database::prepare('SELECT chambres.id, chambres.nom, chambres.numero FROM chambres INNER JOIN reservations WHERE reservations.id!=:booking AND reservations.chambreId = chambres.id');
            $stmt2->execute(['booking' => $bookingId]);

            while ($row = $stmt2->fetch())
            {
                $rooms .= "<option value='".$row['id']."'>";
                $rooms .= "N°".$row['numero']." : ".$row['nom'];
                $rooms .= "</option>";
            };

            return $rooms;
        }
}