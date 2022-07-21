<?php
header("Allow-Control-Allow-Origin");
header('Content-type:application/json');

require_once "../../Config/Database.php";
require_once "../../Model/Post.php";

$database= new Database();
$db=$database->connect();
$post = new Post($db);
$id = isset($_GET['id']) ? $_GET['id'] : die("id introuvable");
$post->set_id($id);
if($post->deleteElement()){
  echo json_encode(array(
    "message" =>" Element supprime avec succeee"
  ));
 } else{
    echo json_encode(array(
      "message" =>" Element non supprime"
    ));
  }
?>