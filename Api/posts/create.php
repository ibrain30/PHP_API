<?php
header("Access-Control-Allow-Origin:*");
header('Content-type:application/json');
header('Access-Control-Allow-Methods:POST');
header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods,Authorization,X-Requested-With');


require_once "../../Config/Database.php";
require_once "../../Model/Post.php";s

$database= new Database();
$db=$database->connect();
$post = new Post($db);
// Recuperation des a partir de cette fonction 
$data = json_decode(file_get_contents("php://input"));

$post->set_title($data->title);
$post->set_description($data->description);
$post->set_id_categ($data->id_categ) ;
$post->set_autor($data->autor);

if($post->createElement()){

  echo json_encode(array(
    "message " => "Post create avec succee"
  ));

}else{
  echo json_encode(array(
    "message " => "Post non cree"
  ));

}






?>