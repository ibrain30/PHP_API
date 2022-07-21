<?php
//namespace App;
require_once "../interface/Gene.php";
/**
 * Definition de la classe Post 
 */
class Post implements generale{

  //Declaration des Variables pour la base

  private $conn ;
  private $table='produit';

  // Definition des Proprietes de la classe Post  

  private  $id;
  private  $title;
  private  $description;
  private  $id_categ;
  private  $autor;

  /**
   * @param $db de la fonction constructeur  
   */
  public function __construct($db){

    $this->conn = $db;
  }

  /**
   * Getters && setters 
   */
  public function get_id(){

    return $this->id;
  }
  public function get_title(){
    return $this->title;
  }
  public function get_description(){
    return $this->description;
  }
  public function get_id_categ(){
    return $this->id_categ;
  }
  public function get_autor(){
    return $this->autor;
  }
  public function set_id($id){  

    $this->id = $id ;
  } 
  public function set_title($title){
    $this->title = $title;
  }
  public function set_description($description){
    $this->description =  $description;
  }
  public function set_id_categ($id_categ){
    $this->id_categ = $id_categ;
  }
  public function set_autor($autor){
    $this->autor = $autor;
  }

  /**
   * Fonction pour lire les donnees dans la base de donnee 
   * @return $data un tableau d'object 
   */

  public function read(){

    $query ='SELECT * FROM '.$this->table.';';
    $data=$this->conn->query($query);
    return $data;
  }

  /**
   * Fonction pour lire un element parraport a son identifiant  
   * @return L'element 
   */

  public function singlePost(){

    $query = 'SELECT * FROM '.$this->table.' WHERE id=? ;';
    $stm = $this->conn->prepare($query);
    $stm->bindParam(1,$this->id);
    $stm->execute();
    $row = $stm->fetch(PDO::FETCH_ASSOC);
    $this->id = $row['id'];
    $this->title = $row['title'];
    $this->description  = $row['description'];
    $this->id_categ = $row ['id_categ'];
    $this->autor = $row ['autor'];

    
  }

  /**
   * Fonction pour creee un element
   * @return true si la requette est execute normalement 
   * sinon elle retourne false  
   */

  public function createElement(){  
    $query = "INSERT INTO produit
    SET
    title =:title,
    description=:description,
    id_categ=:id_categ,
    autor=:autor";

    $stmt = $this->conn->prepare($query);

    $this->title=htmlspecialchars_decode(strip_tags($this->title));
    $this->description=htmlspecialchars_decode(strip_tags($this->description));
    $this->id_categ=htmlspecialchars_decode(strip_tags($this->id_categ));
    $this->autor=htmlspecialchars_decode(strip_tags($this->autor));

    $stmt->bindParam(':title',$this->title);
    $stmt->bindParam(':description',$this->description);
    $stmt->bindParam(':id_categ',$this->id_categ);
    $stmt->bindParam(':autor',$this->autor);

    if($stmt->execute()){
      return true;
    }
    return false;
  }

  /**
   * Fonction pour faire les mise a jours de L'element 
   */
  public function updateElement(){
    $query = "UPDATE  produit
    SET
    title =:title,
    description=:description,
    id_categ=:id_categ,
    autor=:autor
    WHERE id=:id";
    $stmt = $this->conn->prepare($query);
    
    $stmt->bindParam(':id',$this->id);
    $stmt->bindParam(':title',$this->title);
    $stmt->bindParam(':description',$this->description);
    $stmt->bindParam(':id_categ',$this->id_categ);
    $stmt->bindParam(':autor',$this->autor);

    if($stmt->execute()){
      return true;
    }
    return false;
  }

  /**
   * Fonction pour supprime un element 
   * @param id de l'element 
   * @return true si l'element est supprime avec succe
   */

  public function deleteElement(){
   // $query = 'SELECT * FROM '.$this->table.' WHERE id=? ;';
    $query ='DELETE FROM '.$this->table.' WHERE id=:id ';
    $stmt = $this->conn->prepare($query);
    $stmt->bindParam(':id',$this->id);
    if($stmt->execute()){
      return true;
    }
    return false;

  }

}


?>