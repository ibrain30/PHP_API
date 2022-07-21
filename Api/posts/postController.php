<?php

/**
 * Fonction qui permet d'afficher tous les elements
 */
function displayAllElements(){
   return true;

}
/**
 * Fonction qui permet d'ajoute 
 */
function addElement($post){
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

}

/**
 * Fonction  qui permet de Supprimer un element 
 * 
 */
function deleteElement($post,$id){

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
}
/**
 * Fonction qui permet d'afficher un element selon son id
 * 
 */

function displaySingleElement($post,$id){



 }

/**
 * Fonction qui permet de faire des mise a jour
 */

function updateElement($post,$id){ }

 













?>