<?php
use APP\Post;
header("Allow-Control-Allow-Origin");
header('Content-type:application/json');

require_once "../../Config/Database.php";
require_once "../../Model/Post.php";


$database= new Database();
$db=$database->connect();


$post = new Post($db);
$data=$post->read();

if($data){
 
  $data_Json = array();
  $data_Json['data']=array();
 
while($row = $data->fetch(PDO::FETCH_ASSOC)){
   
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
  echo json_encode($data_Json);
    
  
}else{
    echo json_encode (array(
      "message" => " pas d'elements dans la base "
    ));

};
  


?>