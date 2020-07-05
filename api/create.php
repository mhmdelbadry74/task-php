<?php

/**
 *  create.php to insert data person in person_data 
 *  data insert {name,birth-date,latitude,longitude}
 * to use api php -S 127.0.0.1:8080
 * then open postman 127.0.0.1:8080/api/create.php
 * method use post
 * open Body => raw => json 
 * example insert {
 *  "name" : "mhmd M ahmed " ,
 *"birth_date" :"20-1-2000",
 *"latitude" : 1.5 ,
 *"longitude" : 1.4 
 * } 
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
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($data->name) && !empty($data->birth_date) && !empty($data->latitude) && !empty($data->longitude)) {
    $item->name = $data->name;
    $item->birth_date = $data->birth_date;
    $item->latitude = $data->latitude;
    $item->longitude = $data->longitude;
}else{
    echo 'a7a' ;
}
   
    
    if($item->createPerson()){
        echo 'Person created successfully.';
    } else{
        echo 'Employee could not be created.';
    }
?>