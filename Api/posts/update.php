<?php
header("Access-Control-Allow-Origin:*");
header('Content-type:application/json');
header('Access-Control-Allow-Methods:PUT');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


require_once "../../Config/Database.php";
require_once "../../Model/Post.php";

$database= new Database();
$db=$database->connect();
$post = new Post($db);

// Recuperation des a partir de cette fonction 


$id = isset($_GET['id']) ? $_GET['id'] : die("id introuvable");
$post->set_id($id);

$data = json_decode(file_get_contents("php://input"));
$post->set_title($data->title);
$post->set_description($data->description);
$post->set_id_categ($data->id_categ) ;
$post->set_autor($data->autor);


if($post->updateElement()){

  echo json_encode(array(
    "message " => "Mise a jour  avec succee"
  ));

}else{
  echo json_encode(array(
    "message " => "pas de mise a jour"
  ));

}






?>