<?php
/**
 * Definition de la classe Post 
 */
class Post {

  // Declaration des Variables pour la base

  private $conn ;
  private $table='produit';

  // Definition des Proprietes de la classe Post  

  private  $id;
  public  $title;
  public  $description;
  public  $id_categ;
  public  $categ_name;
  public  $autor;

  /**
   * @param $db de la fonction constructeur  
   */
  public function __construct($db){
       $this->conn = $db;
  }

  /**
   * Getters && setters de @param id 
   */
public function get_id(){
  return $this->id;
}
public function set_id($id){
  $this->id = $id ;
}

  /**
   * Fonction pour lire les donnees dans la base de donnee 
   * @return $data un tableau d'object 
   */
  public function read(){
    $query ='SELECT * FROM produit;';
     $dat=$this->conn->query($query);
    // $dat = $stm->execute();
   
    return $dat;

  }
  /**
   * Fonction pour lire un element parraport a son id 
   * @return L'element 
   */

  public function singlePost(){
    $query = "SELECT * FROM produit WHERE id=? ;";
    $stm = $this->conn->prepare($query);
    $stm->bindParam(1,$this->id);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);

    $this->id = $row['id'];
    $this->title = $row['title'];
    $this->description  = $row['description'];
    $this->id_categ = $row ['id_categ'];
    $this->autor = $row ['id_categ'];

    
  }
}















?>