<?php

class Client{
    private $id;
    private $name;
    private $firstName;
    private $subscription;
    // constructor
        public function __construct($id, $name, $firstName, $subscription){
            $this->id = $id;
            $this->name = $name;
            $this->firstName = $firstName;
            $this->subscription = $subscription;
        }
    //displayOptionsClientsNames
        public static function displayOptionsClientsNames(){
            $stmt = Database::prepare('SELECT clients.id, clients.nom, clients.prenom FROM `clients`');
            $stmt->execute();

            $customers = '';

            while ($row = $stmt->fetch())
            {
                $customers .= "<option value='".$row['id']."'>";
                $customers .= $row['nom']." ".$row['prenom'];
                $customers .= "</option>";
            };

            return $customers;
        }
    //displayOptionsClientsNamesUpdate
        public static function displayOptionsClientsNamesUpdate($bookingId){
            $stmt = Database::prepare('SELECT clients.id, clients.nom, clients.prenom FROM clients INNER JOIN reservations WHERE reservations.id=:booking AND reservations.clientId = clients.id');
            $stmt->execute(['booking' => $bookingId]);

            $customers = '';

            while ($row = $stmt->fetch())
            {
                $customers .= "<option value='".$row['id']."' selected>";
                $customers .= $row['nom']." ".$row['prenom'];
                $customers .= "</option>";
            };

            $stmt2 = Database::prepare('SELECT clients.id, clients.nom, clients.prenom FROM clients INNER JOIN reservations WHERE reservations.id!=:booking AND reservations.clientId = clients.id');
            $stmt2->execute(['booking' => $bookingId]);


            while ($row = $stmt2->fetch())
            {
                $customers .= "<option value='".$row['id']."'>";
                $customers .= $row['nom']." ".$row['prenom'];
                $customers .= "</option>";
            };

            return $customers;
        }

}