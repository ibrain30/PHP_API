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
$post->singlePost();

$element  = array(
  'id' => $post->get_id(),
  'title' => $post->get_title(),
  'description'=> $post->get_description(),
  'autor'=>$post->get_autor(),
  'id_categ'=>$post->get_id_categ()

);

print_r(json_encode($element));



?>