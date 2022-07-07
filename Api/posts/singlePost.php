<?php
header("Allow-Control-Allow-Origin");
header('Content-type:application/json');

require_once "../../Config/Database.php";
require_once "../../Model/Post.php";

/**
 * Instancier notre Database
 */

$database= new Database();
$db=$database->connect();
// Instancier l'object Post 
$post = new Post($db);
/**
 * On recupere L'id au niveau du lien 
 * On le modifier avec le setters 
 * puis on appelle la fonction single post qui recupere l'object post 
 */
$id = isset($_GET['id']) ? $_GET['id'] : die("id introuvable");
$post->set_id($id);
$post->singlePost();
$arra_uno = array(
  'id' => $post->get_id(),
  'title' => $post->title,
  'description'=> $post->description,
  'autor'=>$post->autor,
  'id_categ'=>$post->id_categ

);

print_r(json_encode($arra_uno));



?>