<?php 
class Post{
       // DB stuff
       private $conn;
       private $table='product_type';
       //Post properties
       public $product_id;
       public $name;
       public $status;

       // Constructor with DB
       public function __construct($db)
       {
              $this->conn=$db;
       }

       // Get Posts
       public function read(){
              // Create query
              $query='SELECT * from product_type';
              // Prepare 
              $stmt=$this->conn->prepare($query);
              // Execute
              $stmt->execute();
              return $stmt;
       }

       public function create(){
              $query= 'insert into '.
              $this->table.
              '(name,status) Values(:name,:status) ';
              $stmt=$this->conn->prepare($query);
              // clean data
              $this->name=htmlspecialchars(strip_tags($this->name));
              $this->status=htmlspecialchars(strip_tags($this->status));              
              // bind data
              $stmt->bindParam(':name',$this->name);
              $stmt->bindParam(':status',$this->status);
              // execute query
              if($stmt->execute()){
                     return true;
              }
              // Print error if smth goes wrong
              printf("Error: %s.\n",$stmt->error);
              return false;
       }
}


?>