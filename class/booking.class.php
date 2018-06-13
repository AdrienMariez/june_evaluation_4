<?php

//time constraints : I had to preproccess the html in the methods.

class Booking{
    private $id;
    private $clientId;
    private $roomId;
    private $dateBegin;
    private $dateEnd;
    private $status;
    private $dateModification;
    // constructor
        public function __construct($id, $clientId, $roomId, $dateBegin, $dateEnd, $status){
            $this->id = $id;
            $this->clientId = $clientId;
            $this->roomId = $roomId;
            $this->dateBegin = $dateBegin;
            $this->dateEnd = $dateEnd;
            $this->status = $status;
            $this->dateModification = $dateModification;
        }
    //pushNewBooking
        //this method will have to be reworked on before being activated
        public function pushNewBooking(){
            try{
                $stmt = Database :: prepare('INSERT INTO reservations (reservations.clientId, reservations.chambreId, reservations.dateEntree, reservations.dateSortie, reservations.statut, reservations.dateModification)
                VALUES (:clientId, :chambreId, :dateEntree, :dateSortie, :statut, :dateToday);');

                $stmt->execute(['clientId' => $this->$clientId,'chambreId' => $this->$roomId,'dateEntree' => $this->$dateBegin,'dateSortie' => $this->$dateEnd,'statut' => $this->$status,'dateToday' => $this->$dateModification]);

                $result = "ok";
                return $result;
            }
            catch( PDOException $Exception ) {
                // print ( $Exception->getMessage( ). $Exception->getCode( ) );
            }

        }
    //pushNewBookingNoConstructor
        //method to create a booking WITHOUT constructor
        public function pushNewBookingNoConstructor($clientId, $roomId, $dateBegin, $dateEnd, $status, $today){
            echo "method";
            try{
                $stmt = Database :: prepare('INSERT INTO reservations (reservations.clientId, reservations.chambreId, reservations.dateEntree, reservations.dateSortie, reservations.statut, reservations.dateModification)
                VALUES (:clientId, :roomId, :dateBegin, :dateEnd, :status, :today);');

                $stmt->execute(['clientId' => $clientId,'roomId' => $roomId,'dateBegin' => $dateBegin,'dateEnd' => $dateEnd,'status' => $status,'today' => $today]);

                $result = "ok";
                return $result;
            }
            catch( PDOException $Exception ) {
                print ( $Exception->getMessage( ). $Exception->getCode( ) );
            }

        }
    //displayTableBookings
        //displays the main table
        public function displayTableBookings(){
            try{
                $stmt = Database :: prepare('SELECT reservations.id, clients.nom, chambres.numero, reservations.dateEntree, reservations.dateSortie
                FROM reservations,clients,chambres
                WHERE reservations.clientId = clients.id AND reservations.chambreId = chambres.id;');

                $stmt->execute();

                $tableContent = '';

                while ($row = $stmt->fetch())
                {
                    $datebegin = date_create($row["dateEntree"]);
                    $dateBeginFormated = date_format($datebegin, 'd/m/Y');
                    $dateEnd = date_create($row["dateSortie"]);
                    $dateEndFormated = date_format($dateEnd, 'd/m/Y');

                    $tableContent .= "<tr>";
                    $tableContent .= "<td>".$row['id']."</td>";
                    $tableContent .= "<td>".$row['nom']."</td>";
                    $tableContent .= "<td>N° ".$row['numero']."</td>";
                    $tableContent .= "<td><span class='hideIfMobile'>Du </span>".$dateBeginFormated."<span class='hideIfMobile'> au ".$dateEndFormated."</span></td>";
                    $tableContent .= "<td>";
                    $tableContent .= "<form action='/edit.php' method='post'>";
                    $tableContent .= "<input class='invisible' name='id' value='".$row["id"]."'>";
                    $tableContent .= "<button type='submit'>edit</button>";
                    $tableContent .= "</form>";
                    $tableContent .= "<form action='/remove.php' method='post'>";
                    $tableContent .= "<input class='invisible' name='id' value='".$row["id"]."'>";
                    $tableContent .= "<button type='submit'>remove</button>";
                    $tableContent .= "</form>";
                    $tableContent .= "</td>";
                    $tableContent .= "</tr>";
                };

                return $tableContent;  
            }
            catch( PDOException $Exception ) {
                // print ( $Exception->getMessage( ). $Exception->getCode( ) );
                echo ("");
            } 
        }
    //getSingleBookingById function
        public static function getSingleBookingById($bookingId){

            $stmt = Database :: prepare('SELECT reservations.id, clients.nom, chambres.numero, reservations.dateEntree, reservations.dateSortie
            FROM reservations,clients,chambres WHERE reservations.clientId = clients.id AND reservations.chambreId = chambres.id AND reservations.id=:booking;');

            $stmt->execute(['booking' => $bookingId]);

            while ($row = $stmt->fetch())
            {
                $datebegin = date_create($row["dateEntree"]);
                $dateBeginFormated = date_format($datebegin, 'd/m/Y');
                $dateEnd = date_create($row["dateSortie"]);
                $dateEndFormated = date_format($dateEnd, 'd/m/Y');

                $bookingById = '';

                $bookingById .= "<div class='flexCol justifyCntr textAlCntr spacingDown'>";
                $bookingById .= "<div> réservation n°";
                $bookingById .= $row['id'];
                $bookingById .= "  /  ";
                $bookingById .= $row['nom'];
                $bookingById .= "</div>";
                $bookingById .= "<div>Du ";
                $bookingById .= $dateBeginFormated;
                $bookingById .= "</div>";
                $bookingById .= "<div>Au ";
                $bookingById .= $dateEndFormated;
                $bookingById .= "</div>";
                $bookingById .= "</div>";
            };
            return $bookingById;
        }
    //displayOptionsStatus
        //to create options for status
        public static function displayOptionsStatus(){
            $stmt = Database::prepare('SELECT reservations.statut FROM reservations GROUP BY reservations.statut');
            $stmt->execute();

            $status = '';

            while ($row = $stmt->fetch())
            {
                $status .= "<option value='".$row['statut']."'>";
                $status .= $row['statut'];
                $status .= "</option>";
            };

            return $status;
        }
    //displayOptionsStatusUpdate
        //to create options for status with the current selected choice placed first
        public static function displayOptionsStatusUpdate($bookingId){

            //adds the first (selected) option
            $stmt = Database::prepare('SELECT reservations.statut FROM reservations WHERE reservations.id=:booking');
            $stmt->execute(['booking' => $bookingId]);

            $status = '';

            while ($row = $stmt->fetch())
            {
                $status .= "<option value='".$row['statut']."' selected>";
                $status .= $row['statut'];
                $status .= "</option>";
            };

            //adds the other options
            $stmt2 = Database::prepare('SELECT reservations.statut FROM reservations WHERE reservations.statut!=(SELECT reservations.statut FROM reservations WHERE reservations.id=:booking) GROUP BY reservations.statut');
            $stmt2->execute(['booking' => $bookingId]);


            while ($row = $stmt2->fetch())
            {
                $status .= "<option value='".$row['statut']."'>";
                $status .= $row['statut'];
                $status .= "</option>";
            };

            return $status;
        }
    //displayBeginDate
        public static function displayBeginDate($bookingId){
            $stmt = Database::prepare('SELECT reservations.dateEntree FROM reservations WHERE reservations.id=:booking');
            $stmt->execute(['booking' => $bookingId]);

            while ($row = $stmt->fetch())
            {
                $dateBegin = date_create($row['dateEntree']);
                $dateBeginFormated = date_format($dateBegin, 'Y-m-d');
            }

            return $dateBeginFormated;
        }
    //displayEndDate
        public static function displayEndDate($bookingId){
            $stmt = Database::prepare('SELECT reservations.dateSortie FROM reservations WHERE reservations.id=:booking');
            $stmt->execute(['booking' => $bookingId]);

            while ($row = $stmt->fetch())
            {
                $dateEnd = date_create($row['dateSortie']);
                $dateEndFormated = date_format($dateEnd, 'Y-m-d');
            }

            return $dateEndFormated;
        }
    //editBookingNoConstructor function
        public function editBookingNoConstructor($id, $clientId, $roomId, $dateBegin, $dateEnd, $status, $today){
            echo "method";
            try{
                $stmt = Database :: prepare('UPDATE reservations SET reservations.clientId=:clientId, reservations.chambreId=:roomId, reservations.dateEntree=:dateBegin, reservations.dateSortie=:dateEnd, reservations.statut=:status, reservations.dateModification=:today
                WHERE reservations.id=:id;');

                $stmt->execute(['id' => $id,'clientId' => $clientId,'roomId' => $roomId,'dateBegin' => $dateBegin,'dateEnd' => $dateEnd,'status' => $status,'today' => $today]);

                $result = "ok";
                return $result;
            }
            catch( PDOException $Exception ) {
                print ( $Exception->getMessage( ). $Exception->getCode( ) );
            }

        }
    //removeSingleBookingById function
        //method to remove a booking
        public static function removeSingleBookingById($bookingId){
            try{
                $stmt = Database :: prepare('DELETE
                FROM reservations WHERE reservations.id=:booking;');

                $stmt->execute(['booking' => $bookingId]);

                return $bookingId;
            }
            catch( PDOException $Exception ) {
                print ( $Exception->getMessage( ). $Exception->getCode( ) );
            }
        }
}