<?php 
class database{
    private $host=DB_host;
    private $pass=DB_pass;
    private $user=DB_user;
    private $dbname=DB_name;
   private $stmt;
   private $dbh;
   private $erorre;
   public function __construct()
   {
    $dsn='mysql:host='.$this->host.';dbname='.$this->dbname;
    $option=array(
        PDO::ATTR_PERSISTENT=>true,
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
       );
    try{
      $this->dbh=new PDO($dsn,$this->user,$this->pass,$option);
     }
     catch(PDOException $e){
      $this->erorre=$e->getMessage();
     }
   }
   public function query($query){
    $this->stmt=$this->dbh->prepare($query);
   }
   public function bind($param,$value,$type=null){
    if(is_null($type)){
        switch(true){
            case is_null($value):
                $type=PDO::PARAM_NULL;
                break;
            case is_bool($value):
                $type=PDO::PARAM_BOOL;
                break;
            case is_int($value) :
                $type=PDO::PARAM_INT;
                break;
            default :
            $type=PDO::PARAM_STR;           
        }
    }
    $this->stmt->bindValue($param,$value,$type);
   }
   public function execute(){
    return $this->stmt->execute();
   }
   public function CountRow(){
    $this->execute();
    return $this->stmt->fetchColumn();
   }
   public function ResultSet(){
    $this->execute();
    return $this->stmt->fetchAll(PDO::FETCH_OBJ);
   }
   public function Single(){
    $this->execute();
   return $this->stmt->fetch(PDO::FETCH_OBJ);
   }
}