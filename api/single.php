<?php

/**
 *  single.php to return data person by id 
 *  data return {kid-name,father-name,grandfather-name,birth-date,latitude,longitude}
 * to use api php -S 127.0.0.1:8080
 * then open postman 127.0.0.1:8080/api/single.php/?id=?
 * method use get 
 */
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    include_once '../config/db.php';
    include_once '../class/person.php';

    $database = new Database();
    $db = $database->getConnection();
    $item = new Person($db);
    $item->id = isset($_GET['id']) ? $_GET['id'] : die();
    $item->getOnePerson();
    $name = $item->name; 
    $explode_name  =explode(" ",$name) ;  // explode name to get father-name , grandfather-name
    $kid_name=$explode_name[0]; // kidname 
    $father_name = $explode_name[1];//father name 
    $grandfather_name = $explode_name[2];         //grand fathername   
    if($item->name != null){
        // create array
        $person_arr = array(
            "id" =>  $item->id,
            "name" => $kid_name,
            "father name" => $father_name,
            "grandfather_name" =>$grandfather_name,
            "birth_date" => $item->birth_date,
            "latitude" => $item->latitude,
            "longitude" => $item->longitude,
            
        );
      
        http_response_code(200);
        echo json_encode($person_arr);
    }
      
    else{
        http_response_code(404);
        echo json_encode("person not found.");
    }
?>