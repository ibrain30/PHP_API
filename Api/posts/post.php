<?php
// header("Allow-Control-Allow-Origin");
// header('Content-type:application/json');

require_once "../../Config/Database.php";
require_once "../../Model/Post.php";

/**
 * Instancier notre Database
 */

$database= new Database();
$db=$database->connect();

/**
 * Instancier notre Object Post  
 * Lire les donnes de la base avec la fonction read 
 * Tester s'il retourne un resultat
*/ 

$post = new Post($db);
$data=$post->read();

if($data){
 
  $data_Json = array();
  $data_Json['data']=array();
  var_dump($data);

while($row = $data->fetch(PDO::FETCH_ASSOC)){
    var_dump($row);
    extract($row);
    $items_data = array(
          'id' => $id,
          'title' => $title,
          'description'=> html_entity_decode($description),
          'autor'=>$autor,
          'id_categ'=>$id_categ
    );

    array_push($data_Json['data'],$items_data);
  }

    // echo json_encode($data_Json);
  
}else{
    echo json_encode (array(
      "message" => " pas d'elements dans la base "
    ));

};


?>