<?php

/**
 * class person to table person_data 
 * class include 3 function 
 * createPerson -> to add a new person to db 
 * getOnePerson -> to get data person by id 
 * getpersonsBetweenDates -> to get data person betwen two date 
 */
    class Person{

        // Connection
        private $conn;

        // Table
        private $db_table = "person_data";

        // Columns
        public $id;
        public $name;
        public $birth_date;
        public $birth_date1;
        public $latitude;
        public $longitude;

        // Db connection
        public function __construct($db){
            $this->conn = $db;
        }

      
        // function to add new person 
        public function createPerson(){
            $query = "INSERT INTO
                        ". $this->db_table ."
                    SET
                        name = :name, 
                        birth_date = :birth_date, 
                        latitude = :latitude, 
                        longitude = :longitude" ;
        
            $stmt = $this->conn->prepare($query);
        
            
            $this->name=htmlspecialchars(strip_tags($this->name));
            $this->birth_date=htmlspecialchars(strip_tags($this->birth_date));
            $this->latitude=htmlspecialchars(strip_tags($this->latitude));
            $this->longitude=htmlspecialchars(strip_tags($this->longitude));
        
            // bind data
            $stmt->bindParam(":name", $this->name);
            $stmt->bindParam(":birth_date", $this->birth_date);
            $stmt->bindParam(":latitude", $this->latitude);
            $stmt->bindParam(":longitude", $this->longitude);
            if($stmt->execute()){
               return true;
            }
            return false;
        }

        // end function 

        // function use to get one person by id 
        public function getOnePerson(){

                    $query = "SELECT
                                id, 
                                name, 
                                birth_date, 
                                latitude, 
                                longitude
                            FROM
                                ". $this->db_table ."
                            WHERE 
                            id = ".$this->id."
                        ";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->name = $dataRow['name'];
            $this->birth_date = $dataRow['birth_date'];
            $this->latitude = $dataRow['latitude'];
            $this->longitude = $dataRow['longitude'];
            
        }        


        // end function 

        // function get person by date 
       public function getpersonsBetweenDates(){
           
        $query = "SELECT id, name, birth_date, latitude, longitude  FROM ".$this->db_table ."
         WHERE
        birth_date 
        BETWEEN :birth_date AND :birth_date1
        ";
        

        
                $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":birth_date", $this->birth_date);
            $stmt->bindParam(":birth_date1", $this->birth_date1);

                $stmt->execute();
            $dataRow = $stmt->fetch(PDO::FETCH_ASSOC);  

            $this->id = $dataRow['id'];
            $this->name = $dataRow['name'];
            $this->birth_date = $dataRow['birth_date'];
            $this->latitude = $dataRow['latitude'];
            $this->longitude = $dataRow['longitude'];
           
       }

       // end function 
    } /// end class
?>