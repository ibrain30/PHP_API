<?php


/**
 * Classe Database 
 */
class Database {

/**
 * Propriete de la classe Database 
 */
   private $dbname='Magasin';
   private $host="localhost";
   private $user="root";
   private $password="root";
   private $conn;

 /**
  * Function qui nous permet de cree la connexion
  * @return $conn 
  */
   public function connect(){
    try{

       $this->conn = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->password);
       $this->conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      }catch(PDOException $e){
      echo "erreur message " .$e->getMessage();
    }
      
        return $this->conn;
  }

}

?>